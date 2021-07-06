<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}		
		$this->load->model('Kriteria_model');
	}

	public function index()
	{				
		$judulhalaman = "Kriteria";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->data['pengguna']=$this->Kriteria_model->get_all();
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Kriteria/daftar');	
		$this->load->view('temp/footer');	
	}

	public function insert()
	{
		$this->data['nama_kriteria']=$this->input->post('nama_kriteria');
		$this->data['bobot']=$this->input->post('bobot');
		$result=$this->Kriteria_model->insert($this->data);
		
		// normalisasi bobot
		$normal=$this->Kriteria_model->get_all_bobot();
		$kriteria=$this->Kriteria_model->get_all();
		$jumlah=0;
            foreach ($kriteria as $golongan)
            {
            	$jumlah=$golongan->bobot/$normal;
            	$this->edit['normalisasi']=number_format($jumlah,3);
				$this->Kriteria_model->edit($golongan->id_kriteria,$this->edit);
            }
			if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Kriteria Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Kriteria Gagal Diinput ');				
			}
		redirect('Kriteria');		
	}

	public function form()
	{			
		$judulhalaman = "Kriteria";
		$this->data['judulhalaman'] = $judulhalaman;	
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Kriteria/form');	
		$this->load->view('temp/footer');
	}

	public function delete($id_kriteria= null,$id= null)
	{
		$judulhalaman = "Kriteria";
		$this->data['judulhalaman'] = $judulhalaman;
		$this->Kriteria_model->delete($id_kriteria);
		
		// normalisasi bobot
		$normal=$this->Kriteria_model->get_all_bobot();
		$kriteria=$this->Kriteria_model->get_all();
		$jumlah=0;
            foreach ($kriteria as $golongan)
            {
            	$jumlah=$golongan->bobot/$normal;
            	$this->edit['normalisasi']=number_format($jumlah,3);
				$this->Kriteria_model->edit($golongan->id_kriteria,$this->edit);
            }
		$this->session->set_flashdata('berhasil', 'Data Kriteria Berhasil Dihapus');			
		redirect('Kriteria');	
	}

	public function data_edit($id_kriteria=null){
		$judulhalaman = "Kriteria";
		$this->data['judulhalaman'] = $judulhalaman;		
		$this->data['pengguna']=$this->Kriteria_model->get_data($id_kriteria);
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('Kriteria/edit');	
		$this->load->view('temp/footer');
	}

	public function edit($id_kriteria=null)
	{
		$this->data['nama_kriteria']=$this->input->post('nama_kriteria');
		$this->data['bobot']=$this->input->post('bobot');
		$result=$this->Kriteria_model->edit($id_kriteria,$this->data);
		
		// normalisasi bobot
		$normal=$this->Kriteria_model->get_all_bobot();
		$kriteria=$this->Kriteria_model->get_all();
		$jumlah=0;
            foreach ($kriteria as $golongan)
            {
            	$jumlah=$golongan->bobot/$normal;
            	$this->edit['normalisasi']=number_format($jumlah,3);
				$this->Kriteria_model->edit($golongan->id_kriteria,$this->edit);
            }
		 	if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Kriteria Berhasil Diedit');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Kriteria Gagal Diedit');				
			}
		redirect('Kriteria');
	}	
}
?>