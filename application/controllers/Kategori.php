<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori');
	}

	// List all your items
	public function index()
	{
		// jika bukan superadmin,kembalikan ke halaman dahsboard
		if ($this->session->userdata('username') == 'superadmin')  
		{
			$data = array(
				'title' => 'Kategori',
				'kategori' => $this->m_kategori->get_all_data(),
				'isi' => 'v_kategori',
			);
			$this->load->view('layout/v_wrapper_backend', $data, FALSE);
		}else{
			redirect('admin');
		}
		
	}

	// Add a new item
	public function add()
	{
		if ($this->session->userdata('username') == 'superadmin')  
		{
			$data = array(
				'nama_kategori' => $this->input->post('nama_kategori'),
			);
			
			$this->m_kategori->add($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
			redirect('kategori');
		}else{
			redirect('admin');
		}
		
	}

	//Update one item
	public function edit($id_kategori = NULL)
	{
		if ($this->session->userdata('username') == 'superadmin')  
		{
			$data = array(
				'id_kategori' => $id_kategori,
				'nama_kategori' => $this->input->post('nama_kategori'),
			);
			$this->m_kategori->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diupdate !!!');
			redirect('kategori');
		}else{
			redirect('admin');
		}
		
	}

	//Delete one item
	public function delete($id_kategori = NULL)
	{
		if ($this->session->userdata('username') == 'superadmin')
		{
			$data = array('id_kategori' => $id_kategori);
			$this->m_kategori->delete($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
			redirect('kategori');
		}else{
			redirect('admin');
		}
		
	}
}

/* End of file Kategori.php */
