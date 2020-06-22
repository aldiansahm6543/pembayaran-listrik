<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {

	public function get() {
		$this->db->select('*');
		$this->db->from('tagihan');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
		$this->db->join('tarif', 'tarif.kodetarif = pelanggan.kodetarif');

		return $this->db->get()->result();
	}

	public function getUser() {
		$this->db->select('*');
		$this->db->from('tagihan');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
		$this->db->join('tarif', 'tarif.kodetarif = pelanggan.kodetarif');
		$this->db->where('tagihan.id_pelanggan', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	public function bukti()
	{
		return $this->db->get('bukti_pembayaran')->result();
	}
	public function insert($data) {
		$this->db->insert('tagihan', $data);
	}	

	public function update($data, $id_tagihan)
	{
		$this->db->where('id_tagihan', $id_tagihan);
		$this->db->update('tagihan', $data);
	}
}

/* End of file Tagihan_model.php */
/* Location: ./application/models/Tagihan_model.php */