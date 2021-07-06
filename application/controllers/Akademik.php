<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}
		
		 $this->load->model('Akademik_model');
	


	}

	public function index()
	{	
		
			
		 $judulhalaman = "Akademik";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna']=$this->Akademik_model->get_all();

		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Akademik/daftar');	
		$this->load->view('temp/footer');	

	}

	public function insert(){


		$this->data_user['tahun']=$this->input->post('tahun');

		$result=$this->Akademik_model->insert($this->data_user);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Akademik Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diinput ');				
			}

		redirect('Akademik');
		
	}

	public function form()
	{
		
		$judulhalaman = "Akademik";
		$this->data['judulhalaman'] = $judulhalaman;
	
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Akademik/form');	
		$this->load->view('temp/footer');	

	}

	public function delete($id_akademik= null)
	{
		$judulhalaman = "Data Akademik";
			

		$this->data['judulhalaman'] = $judulhalaman;
		$this->Akademik_model->delete($id_akademik);

		$this->session->set_flashdata('berhasil', 'Data Akademik Berhasil Dihapus');			

		redirect('Akademik');	

	}

	public function data_edit($id_akademik=null){
		$judulhalaman = "Data Akademik";
			

		$this->data['judulhalaman'] = $judulhalaman;

		
		$this->data['pengguna']=$this->Akademik_model->get_data($id_akademik);
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Akademik/edit');	
		$this->load->view('temp/footer');
	}

	public function edit($id_akademik=null){
		$judulhalaman = "Akademik";
			

		$this->data['judulhalaman'] = $judulhalaman;

		
		$this->data_user['tahun']=$this->input->post('tahun');
		$result=$this->Akademik_model->edit($id_akademik,$this->data_user);
		

		 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Akademik Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diinput ');				
			}
		redirect('Akademik');
	}

	
	
}

?>