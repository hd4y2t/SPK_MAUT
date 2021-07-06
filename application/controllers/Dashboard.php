<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}	
		
		$this->data['judulhalaman'] = "Dashboard";
		$this->load->model('Dashboard_model');
	}

	public function index()
	{		
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('temp/Dashboard');	
		$this->load->view('temp/footer');	
	}	

}
?>