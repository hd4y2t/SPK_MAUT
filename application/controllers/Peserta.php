<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peserta extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect('login');
		}
		$this->load->model('Kriteria_model');
		$this->load->model('Jurusan_model');
		$this->load->model('Universitas_model');
		$this->load->model('Pegawai_model');
		$this->load->model('Nilai_model');
		$this->load->model('Nilai_akhir_model');
		$this->load->model('Nilai_utility_model');
		$this->load->model('Akademik_model');
	}

	public function index()
	{
		$judulhalaman = "Daftar Peserta";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna'] = $this->Pegawai_model->get_all_user();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Peserta/list');
		$this->load->view('temp/footer');
	}

	public function daftar($id_pegawai)
	{
		$judulhalaman = "Penilaian Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna'] = $this->Nilai_akhir_model->get_all_join($id_pegawai);
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Peserta/daftar');
		$this->load->view('temp/footer');
	}

	public function nilai($id = null)
	{
		$judulhalaman = "Nilai";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['peringkat'] = $this->Nilai_akhir_model->get_all_join_nilai($id);
		$this->data['peringkat1'] = $this->Nilai_akhir_model->get_all_join1($id);
		$this->data['pengguna'] = $this->Kriteria_model->get_all();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Peserta/nilai');
		$this->load->view('temp/footer');
	}


	public function insert()
	{
		$this->data_user['id_universitas'] = $this->input->post('id_universitas');
		$this->data_user['id_jurusan'] = $this->input->post('id_jurusan');
		$this->data_user['id_akademik'] = $this->input->post('id_akademik');
		$result = $this->Nilai_akhir_model->insert($this->data_user);
		$id_nilai_akhir = $this->Nilai_akhir_model->get_data_last();


		//selesai simpan tabel nilai

		//simpan nilai kiteria
		$this->nilai_kriteria['id_nilai_akhir'] = $id_nilai_akhir;
		$kiteria = $this->Kriteria_model->get_all();
		foreach ($kiteria as $out) {
			// $jumlah=$this->Nilai_model->get_rata($out->id_kriteria,$id_nilai_akhir);
			$this->nilai_kriteria['nilai_kriteria'] = $this->input->post($out->id_kriteria);
			$this->nilai_kriteria['id_kriteria'] = $out->id_kriteria;
			$this->Nilai_utility_model->insert($this->nilai_kriteria);
		}
		//selesai simpan nilai kiteria

		//simpan nilai Utility
		$tahun = $this->Akademik_model->get_all();
		foreach ($tahun as $year) {
			$nilai = $this->Nilai_utility_model->get_all_year($year->id_akademik);
			foreach ($nilai as $out) {
				$x = 0;
				$y = 0;
				$z = 0;
				$min = $this->Nilai_utility_model->get_min($out->id_kriteria);
				$max = $this->Nilai_utility_model->get_max($out->id_kriteria);
				//rumus nilai utility
				$x = $max - $min;
				$y = $out->nilai_kriteria - $min;
				$z = $y / $x;
				$this->nilai_utility['nilai_utility'] = number_format($z, 3);
				$this->Nilai_utility_model->edit($out->id_utility, $this->nilai_utility);
			}
		}
		//selesai simpan nilai utility

		//simpan nilai normalisasi
		$nilai_normal = $this->Nilai_utility_model->get_all_join();
		foreach ($nilai_normal as $normal) {
			$a = 0;
			$a = $normal->nilai_utility * $normal->normalisasi;
			$this->nilai_normalisasi['nilai_normalisasi'] = number_format($a, 3);
			$this->Nilai_utility_model->edit($normal->id_utility, $this->nilai_normalisasi);
		}
		//selesai simpan nilai normalisasi

		//simpan nilai Akhir
		$nilai_akhir = $this->Nilai_akhir_model->get_all();
		foreach ($nilai_akhir as $akhir) {
			//$b=0;
			$b = $this->Nilai_utility_model->get_rata($akhir->id_nilai_akhir);
			$this->nilai_akhir['nilai_akhir'] = number_format($b, 3);
			$this->Nilai_akhir_model->edit($akhir->id_nilai_akhir, $this->nilai_akhir);
		}
		//selesai simpan nilai akhir		
		if ($result != null) {
			$this->session->set_flashdata('berhasil', 'Data Penilaian Jurusan Berhasil Diinput');
		} else {
			$this->session->set_flashdata('gagal', 'Data Penilaian Jurusan Gagal Diinput ');
		}
		redirect('Peserta');
	}

	public function form()
	{
		$this->data['pengguna'] = $this->Kriteria_model->get_all();
		$this->data['jurusan'] = $this->Jurusan_model->get_all();
		$this->data['univ'] = $this->Universitas_model->get_all();
		$this->data['akademik'] = $this->Akademik_model->get_all();

		$judulhalaman = "Penilaian Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Peserta/form');
		$this->load->view('temp/footer');
	}

	public function delete($id = null)
	{
		$judulhalaman = "Penilaian Jurusan";
		$this->Nilai_akhir_model->delete($id);
		$kiteria = $this->Kriteria_model->get_all();
		$nilai = $this->Nilai_utility_model->get_all();

		//simpan nilai Utility
		$tahun = $this->Akademik_model->get_all();
		foreach ($tahun as $year) {
			foreach ($nilai as $out) {
				$x = 0;
				$y = 0;
				$z = 0;
				$min = $this->Nilai_utility_model->get_min($out->id_kriteria);
				$max = $this->Nilai_utility_model->get_max($out->id_kriteria);
				$x = $max - $min;
				$y = $out->nilai_kriteria - $min;
				$z = $y / $x;
				$this->nilai_utility['nilai_utility'] = number_format($z, 3);
				//var_dump($z);
				//var_dump($out->id_kriteria);
				$this->Nilai_utility_model->edit($out->id_utility, $this->nilai_utility);
			}
		}
		//selesai nilai utility
		$nilai_normal = $this->Nilai_utility_model->get_all_join();

		//simpan nilai normalisasi
		foreach ($nilai_normal as $out) {
			$a = 0;
			$a = $out->nilai_utility * $out->normalisasi;
			$this->nilai_normalisasi['nilai_normalisasi'] = number_format($a, 3);
			$this->Nilai_utility_model->edit($out->id_utility, $this->nilai_normalisasi);
		}
		//selesai nilai normalisasi

		//nilai Akhir
		$nilai_akhir = $this->Nilai_akhir_model->get_all();
		foreach ($nilai_akhir as $out) {
			//$b=0;
			$b = $this->Nilai_utility_model->get_rata($out->id_nilai_akhir);
			$this->nilai_akhir['nilai_akhir'] = number_format($b, 3);
			$this->Nilai_akhir_model->edit($out->id_nilai_akhir, $this->nilai_akhir);
		}

		$this->session->set_flashdata('berhasil', 'Data Penilaian Jurusan Berhasil Dihapus');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		// redirect('Peserta/daftar');
	}

	public function akademik()
	{
		$judulhalaman = "Nilai";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna'] = $this->Akademik_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Peserta/akademik');
		$this->load->view('temp/footer');
	}

	public function edit($id = null)
	{
		$this->data['pengguna'] = $this->Kriteria_model->get_all();
		$this->data['MK'] = $this->Jurusan_model->get_all();
		$this->data['dosen'] = $this->Universitas_model->get_all();
		$this->data['akademik'] = $this->Akademik_model->get_all();
		$this->data['nilai_akhir'] = $this->Nilai_akhir_model->get_all_join_id($id);

		$judulhalaman = "Penilaian Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Peserta/form_edit');
		$this->load->view('temp/footer');
	}

	public function view($id = null)
	{
		$this->data['pengguna'] = $this->Kriteria_model->get_all();
		$this->data['MK'] = $this->Jurusan_model->get_all();
		$this->data['dosen'] = $this->Universitas_model->get_all();
		$this->data['nilai_akhir'] = $this->Nilai_akhir_model->get_all_join_id($id);

		$judulhalaman = "Penilaian Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Peserta/form_view');
		$this->load->view('temp/footer');
	}

	public function insert_edit()
	{
		$id_nilai_akhir = $this->input->post('id_nilai_akhir');


		//edit nilai kiteria
		//$this->nilai_kriteria['id_nilai_akhir']=$id_nilai_akhir;
		$this->nilai_kriteria['id_nilai_akhir'] = $id_nilai_akhir;
		$kiteria = $this->Kriteria_model->get_all();
		foreach ($kiteria as $out) {
			// $jumlah=$this->Nilai_model->get_rata($out->id_kriteria,$id_nilai_akhir);
			$this->nilai_kriteria['nilai_kriteria'] = $this->input->post($out->id_kriteria);
			$this->nilai_kriteria['id_kriteria'] = $out->id_kriteria;
			$this->Nilai_utility_model->edit_nilai($out->id_kriteria, $id_nilai_akhir, $this->nilai_kriteria);
		}
		//selesai simpan nilai kiteria

		// simpan nilai Utility
		$tahun = $this->Akademik_model->get_all();
		foreach ($tahun as $year) {
			$nilai = $this->Nilai_utility_model->get_all_year($year->id_akademik);
			foreach ($nilai as $out) {
				$x = 0;
				$y = 0;
				$z = 0;
				$min = $this->Nilai_utility_model->get_min($out->id_kriteria);
				$max = $this->Nilai_utility_model->get_max($out->id_kriteria);
				$x = $max - $min;
				$y = $out->nilai_kriteria - $min;
				$z = $y / $x;
				$this->nilai_utility['nilai_utility'] = number_format($z, 3);
				$this->Nilai_utility_model->edit($out->id_utility, $this->nilai_utility);
			}
		}
		//selesai simpan nilai utility

		//simpan nilai normalisasi
		$nilai_normal = $this->Nilai_utility_model->get_all_join();
		foreach ($nilai_normal as $normal) {
			$a = 0;
			$a = $normal->nilai_utility * $normal->normalisasi;
			$this->nilai_normalisasi['nilai_normalisasi'] = number_format($a, 3);
			$this->Nilai_utility_model->edit($normal->id_utility, $this->nilai_normalisasi);
		}
		//selesai nilai normalisasi

		//nilai Akhir
		$nilai_akhir = $this->Nilai_akhir_model->get_all();
		foreach ($nilai_akhir as $akhir) {
			//$b=0;
			$b = $this->Nilai_utility_model->get_rata($akhir->id_nilai_akhir);
			$this->nilai_akhir['nilai_akhir'] = number_format($b, 3);
			$this->Nilai_akhir_model->edit($akhir->id_nilai_akhir, $this->nilai_akhir);
		}

		// selesai nilai akhir
		if ($result == null) {
			$this->session->set_flashdata('berhasil', 'Data Penilaian Jurusan Berhasil Diedit');
		} else {
			$this->session->set_flashdata('gagal', 'Data Gagal Diedit');
		}
		redirect('Peserta');
	}
}
