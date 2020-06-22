<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

	public function get() {
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan');
		$this->db->join('tarif', 'tarif.kodetarif = pelanggan.kodetarif');
		return $this->db->get()->result();
	}

	public function getHistory() {
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan');
		$this->db->join('tarif', 'tarif.kodetarif = pelanggan.kodetarif');
		$this->db->where(['pembayaran.id_pelanggan' => $this->session->userdata('id')]);
		return $this->db->get()->result();
	}
	public function insert($data) {
		$this->db->insert('pembayaran', $data);
	}

	public function bukti() {
		$this->db->select('*');
		$this->db->from('tagihan');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
		$this->db->join('tarif', 'tarif.kodetarif = pelanggan.kodetarif');
		$this->db->join('bukti_pembayaran', 'bukti_pembayaran.tagihan_id = tagihan.id_tagihan');
		return $this->db->get()->result();
	}

	public function buktiId($id) {
		$this->db->select('*');
		$this->db->from('tagihan');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
		$this->db->join('tarif', 'tarif.kodetarif = pelanggan.kodetarif');
		$this->db->join('bukti_pembayaran', 'bukti_pembayaran.tagihan_id = tagihan.id_tagihan');
		$this->db->where('id_bukti', $id);
		return $this->db->get()->row();
	}

}

/* End of file Pembayaran_model.php */
/* Location: ./application/models/Pembayaran_model.php */