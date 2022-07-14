<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	// count total barang/kue
	public function total_barang()
	{
		return $this->db->get('tbl_barang')->num_rows();
	}

	// count total kategori
	public function total_kategori()
	{
		return $this->db->get('tbl_kategori')->num_rows();
	}
	// count total pesanan
	public function total_pesanan_masuk()
	{
		return $this->db->get('tbl_transaksi')->num_rows();
	}
	// count pelanggan
	public function total_pelanggan()
	{
		return $this->db->get('tbl_pelanggan')->num_rows();
	}
	public function data_setting()
	{
		$this->db->select('*');
		$this->db->from('tbl_setting');
		$this->db->where('id', 1);
		return $this->db->get()->row();
	}

	// pelanggan
	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->order_by('id_pelanggan', 'desc');
		return $this->db->get()->result();
	}

	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_setting', $data);
	}
}
