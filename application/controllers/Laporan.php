<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}		
		$this->load->model('Kriteria_model');
		$this->load->model('Pegawai_model');
		$this->load->model('Jurusan_model');
		$this->load->model('Universitas_model');
	}

	public function index()
	{				
	}
	public function Kriteria()
	{				
		$judulhalaman = "Laporan Kriteria";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna']=$this->Kriteria_model->get_all();
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Laporan/kriteria');	
		$this->load->view('temp/footer');	
	}
	public function pegawai()
	{				
		$judulhalaman = "Laporan Pegawai";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna']=$this->Pegawai_model->get_all();
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Laporan/pegawai');	
		$this->load->view('temp/footer');	
	}
	public function jurusan()
	{				
		$judulhalaman = "Laporan Jurusan";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna']=$this->Jurusan_model->get_all();
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Laporan/jurusan');	
		$this->load->view('temp/footer');	
	}
	public function universitas()
	{				
		$judulhalaman = "Laporan Universitas";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna']=$this->Universitas_model->get_all();
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Laporan/universitas');	
		$this->load->view('temp/footer');	
	}


}
?>