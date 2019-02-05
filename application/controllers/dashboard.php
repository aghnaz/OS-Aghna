<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	if ($this->session->userdata('login')!=TRUE) {
	// 		redirect('admin/login','refresh');
	// 	}
	// 	$this->load->model('m_minum','minum');
	// }

	public function index()
	{
		// $data['tampil_minum']=$this->minum->tampil();
		// $data['kategori']=$this->minum->data_kategori();
		$data['konten']="dashboard";
		$data['judul']="Selamat Datang:)";
		$this->load->view('template', $data);
    }
    
}