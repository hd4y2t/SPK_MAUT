<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['extra'] = "Login";
		$this->data['judulhalaman'] = "Login";
		$this->load->model('Pengguna_model');
	}

	public function index()
	{
		if (!$this->session->userdata('login')) {
			$this->load->view('login');
		} else {
			redirect('dashboard');
		}
	}


	public function autentication()
	{
		//$jabatan = $this->input->post('jabatan');
		$bagian = $this->input->post('bagian');
		$nik = $this->input->post('nik');
		$password = $this->input->post('password');

		$cek = $this->Pengguna_model->cek_login($nik, md5($password));
		$nama = $cek->nama_pegawai;
		$id = $cek->id_pegawai;

		if ($cek != null) {
			$unit_pegawai = $cek->jabatan;
			$password = $cek->password;
			$username = $cek->username;
			$this->session->set_userdata(array(
				'login' => true,
				'nama' => $nama,
				'id' => $id,
				'unit_pegawai' => $unit_pegawai,
				'username' => $username,
				'password' => $password
			));
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('login', 'Login tidak berhasil <br> Username dan password salah');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
