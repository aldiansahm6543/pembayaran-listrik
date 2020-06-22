<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan_model extends CI_Model {

	public function get() {
		$this->db->select('*');
		$this->db->from('penggunaan');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = penggunaan.id_pelanggan');
		return $this->db->get()->result();
		
	}	

	public function insert($data) {
		$this->db->insert('penggunaan', $data);
	}	

	public function update($data, $id_penggunaan)
	{
		$this->db->where('id_penggunaan', $id_penggunaan);
		$this->db->update('penggunaan', $data);
	}
	
	public function delete($id)
	{
		$this->db->delete('penggunaan', ['id_pelanggan' => $id]);
	}

}

/* End of file Penggunaan_model.php */
/* Location: ./application/models/Penggunaan_model.php */