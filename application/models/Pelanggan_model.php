<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function get() {
		return $this->db->get('pelanggan')->result();
		
	}	
	public function insert($data) {
		$this->db->insert('pelanggan', $data);
	}

}

/* End of file pelanggan_model.php */
/* Location: ./application/models/pelanggan_model.php */