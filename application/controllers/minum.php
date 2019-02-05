<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class minum extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
			redirect('admin/login','refresh');
		}
		$this->load->model('m_minum','minum');
	}

	public function index()
	{
		$data['tampil_minum']=$this->minum->tampil();
		$data['kategori']=$this->minum->data_kategori();
		$data['konten']="v_minum";
		$data['judul']="Daftar Minuman";
		$this->load->view('template', $data);
	}
	public function toko()
	{
		$data['tampil_minum']=$this->minum->tampil();
		$data['kategori']=$this->minum->data_kategori();
		$data['konten']="toko";
		$data['judul']="HAUSA";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_minum', 'nama_minum', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		if ($this->form_validation->run()==TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000';
			$config['max_width']  = '5000';
			$config['max_height']  = '5000';
			if ($_FILES['foto_cover']['name']!="") {
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('foto_cover')) {
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}else {
					if ($this->minum->simpan_minum($this->upload->data('file_name'))) {
						$this->session->set_flashdata('pesan', 'Sukses menambah ');
					}else{
						$this->session->set_flashdata('pesan', 'Gagal menambah');
					}
					redirect('minum','refresh');
				}
			}else{
				if ($this->minum->simpan_minum('')) {
					$this->session->set_flashdata('pesan', 'Sukses menambah');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal menambah');
				}
				redirect('minum','refresh');
			}
			
		}else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('minum','refresh');
		}
	}
	public function edit_minum($id)
	{
		$data=$this->minum->detail($id);
		echo json_encode($data);
	}
	public function minum_update()
	{
		if($this->input->post('edit')){
			if($_FILES['foto_cover']['name']==""){
				if($this->minum->edit_minum()){
					$this->session->set_flashdata('pesan', 'Sukses update');
					redirect('minum');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal update');
					redirect('minum');
				}
			} else {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '20000';
				$config['max_width']  = '5024';
				$config['max_height']  = '5768';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto_cover')){
					$this->session->set_flashdata('pesan', 'Gagal Upload');
					redirect('minum');
				}
				else{
					if($this->minum->edit_minum_dengan_foto($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'Sukses update');
						redirect('minum');
					} else {
						$this->session->set_flashdata('pesan', 'Gagal update');
						redirect('minum');
					}
				}
			}
			
		}

	}
	public function hapus($id_minum='')
	{
		if ($this->minum->hapus_minum($id_minum)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus minum');
			redirect('minum','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal Hapus minum');
			redirect('minum','refresh');
		}
	}

}

/* End of file minum.php */
/* Location: ./application/controllers/minum.php */