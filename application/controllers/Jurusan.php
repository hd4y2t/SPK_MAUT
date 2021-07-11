<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jurusan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect('login');
		}
		$this->load->model('Jurusan_model');
	}

	public function index()
	{
		$judulhalaman = "Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna'] = $this->Jurusan_model->get_all();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Jurusan/daftar');
		$this->load->view('temp/footer');
	}

	public function insert()
	{
		$this->data_user['jurusan'] = $this->input->post('jurusan');
		$result = $this->Jurusan_model->insert($this->data_user);
		if ($result != null) {
			$this->session->set_flashdata('berhasil', 'Data Jurusan Berhasil Diinput');
		} else {
			$this->session->set_flashdata('gagal', 'Data Jurusan Gagal Diinput ');
		}
		redirect('Jurusan');
	}

	public function form()
	{
		$judulhalaman = "Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Jurusan/form');
		$this->load->view('temp/footer');
	}

	public function delete($id_jurusan = null)
	{
		$judulhalaman = "Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->Jurusan_model->delete($id_jurusan);
		$this->session->set_flashdata('berhasil', 'Data Jurusan Berhasil Dihapus');
		redirect('Jurusan');
	}

	public function data_edit($id_jurusan = null)
	{
		$judulhalaman = "Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna'] = $this->Jurusan_model->get_data($id_jurusan);
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('Jurusan/edit');
		$this->load->view('temp/footer');
	}

	public function edit($id_jurusan = null)
	{
		$judulhalaman = "Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data_user['jurusan'] = $this->input->post('jurusan');
		$result = $this->Jurusan_model->edit($id_jurusan, $this->data_user);
		if ($result != null) {
			$this->session->set_flashdata('berhasil', 'Data Jurusan Berhasil Diedit');
		} else {
			$this->session->set_flashdata('gagal', 'Data Gagal Diedit');
		}
		redirect('Jurusan');
	}
}
