<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
	public function register($data)
	{
		$this->db->insert('tbl_pelanggan', $data);
	}



}

/* End of file M_pelanggan.php */
