<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_pesanan_masuk');

	}


	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'total_barang' => $this->m_admin->total_barang(),
			'total_kategori' => $this->m_admin->total_kategori(),
			'total_pesanan_masuk' => $this->m_admin->total_pesanan_masuk(),
			'total_pelanggan' => $this->m_admin->total_pelanggan(),
			'isi' => 'v_admin',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function setting()
	{

		// hanya bisa diakses superadmin
		if ($this->session->userdata('username') == 'superadmin') 
	
		{
			$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array(
				'required' => '%s Harus Di isi !!!'
			));
			$this->form_validation->set_rules('kota', 'Kota', 'required', array(
				'required' => '%s Harus Di isi !!!'
			));
			$this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required', array(
				'required' => '%s Harus Di isi !!!'
			));
			$this->form_validation->set_rules('no_telpon', 'No Telpon', 'required', array(
				'required' => '%s Harus Di isi !!!'
			));
	
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'title' => 'Setting ',
					'setting' => $this->m_admin->data_setting(),
					'isi' => 'v_setting',
				);
				$this->load->view('layout/v_wrapper_backend', $data, FALSE);
			} else {
				$data = array(
					'id' => 1,
					'lokasi' => $this->input->post('kota'),
					'nama_toko' => $this->input->post('nama_toko'),
					'alamat_toko' => $this->input->post('alamat_toko'),
					'no_telpon' => $this->input->post('no_telpon'),
				);
				$this->m_admin->edit($data);
				$this->session->set_flashdata('pesan', 'Settingan Berhasil di Ganti !!!');
				redirect('admin/setting');
			}
		}else{
			redirect('admin');
		}
	

	}

		// List all your items
		public function list_pelanggan($offset = 0)
		{
			$data = array(
				'title' => 'Pelanggan',
				'pelanggan'	=> $this->m_admin->get_all_data(),
				'isi' => 'v_pelanggan',
			);
			$this->load->view('layout/v_wrapper_backend', $data, FALSE);
		}

	public function pesanan_masuk()
	{
		$data = array(
			'title' => 'Pesanan Masuk',
			'pesanan' => $this->m_pesanan_masuk->pesanan(),
			'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
			'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
			'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
			'isi' => 'v_pesanan_masuk',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function proses($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '1'
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses/Dikemas !!!');
		redirect('admin/pesanan_masuk');
	}

	public function kirim($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'no_resi' => $this->input->post('no_resi'),
			'status_order' => '2'
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Kirim !!!');
		redirect('admin/pesanan_masuk');
	}
}
