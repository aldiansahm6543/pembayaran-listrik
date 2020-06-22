<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif_model extends CI_Model {


	public function get() {
		return $this->db->get('tarif')->result();
		
	}	

	public function insert($data) {
		$this->db->insert('tarif', $data);
	}	
	
	public function delete($id)
	{
		$this->db->delete('tarif', ['kodetarif' => $id]);
	}

}

/* End of file Tarif_model.php */
/* Location: ./application/models/Tarif_model.php */