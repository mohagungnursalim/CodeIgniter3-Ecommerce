<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_gambarbarang extends CI_Model
{
	public function get_all_data()
	{
		$this->db->select('tbl_barang.*,COUNT(tbl_gambar.id_barang) as total_gambar');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_gambar', 'tbl_gambar.id_barang = tbl_barang.id_barang', 'left');
		$this->db->group_by('tbl_barang.id_barang');
		$this->db->order_by('tbl_barang.id_barang', 'desc');
		return $this->db->get()->result();
	}

	public function get_data($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('tbl_gambar');
		$this->db->where('id_gambar', $id_gambar);
		return $this->db->get()->row();
	}

	public function get_gambar($id_barang)
	{
		$this->db->select('*');
		$this->db->from('tbl_gambar');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tbl_gambar', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('tbl_gambar', $data);
	}
}
