<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Universitas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();	
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}
	$this->load->model('Universitas_model');
	}

	public function index()
	{				
		$judulhalaman = "Universitas";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna']=$this->Universitas_model->get_all();
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Universitas/daftar');	
		$this->load->view('temp/footer');	
	}

	public function insert()
	{
		$this->data_user['nama_universitas']=$this->input->post('nama_universitas');
		$result=$this->Universitas_model->insert($this->data_user);
			if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Universitas Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Universitas Gagal Diinput ');				
			}
		redirect('Universitas');		
	}

	public function form()
	{
		$judulhalaman = "Universitas";
		$this->data['judulhalaman'] = $judulhalaman;	
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Universitas/form');	
		$this->load->view('temp/footer');	

	}

	public function delete($id_universitas= null)
	{
		$judulhalaman = "Universitas";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->Universitas_model->delete($id_universitas);
		$this->session->set_flashdata('berhasil', 'Data Universitas Berhasil Dihapus');			
		redirect('Universitas');	
	}

	public function data_edit($id_universitas=null){
		$judulhalaman = "Universitas";
		$this->data['judulhalaman'] = $judulhalaman;		
		$this->data['pengguna']=$this->Universitas_model->get_data($id_universitas);
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Universitas/edit');	
		$this->load->view('temp/footer');
	}

	public function edit($id_universitas=null){
		$judulhalaman = "Universitas";
		$this->data['judulhalaman'] = $judulhalaman;		
		$this->data_user['nama_universitas']=$this->input->post('nama_universitas');
		$result=$this->Universitas_model->edit($id_universitas,$this->data_user);
		if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Universitas Berhasil Diedit');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diedit');				
			}
		redirect('Universitas');
	}	
}
?>