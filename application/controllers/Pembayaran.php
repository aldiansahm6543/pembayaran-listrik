<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$email = $this->session->userdata('email');
		if(empty($logged_in && $email))
		{
			redirect('auth');
		}
		$this->load->model('penggunaan_model', 'penggunaan');
		$this->load->model('tagihan_model', 'tagihan');
		$this->load->model('pembayaran_model', 'pembayaran');
	}

	public function index()
	{
		$data['page'] = 'pembayaran/index';
		$data['pembayaran'] = $this->pembayaran->get();
	 	$this->load->view('templates/content', $data);		
	}

	public function bukti()
	{
		$data['page'] = 'pembayaran/bukti_pembayaran';
		$data['bukti'] = $this->pembayaran->bukti();
	 	$this->load->view('templates/content', $data);
	}

	public function konfirmasi($id)
	{
		$bukti = $this->pembayaran->buktiId($id);
		$id_tagihan = $bukti->id_tagihan;
		$data = [
			'id_pelanggan' => $bukti->id_pelanggan,
			'tanggal' => date('Y-m-d'),
			'bulanbayar' => date('F'),
			'biayaadmin' => 2500,
			'totalbayar' => $bukti->tarifperkwh * $bukti->jumlahmeter + 2500
		];
		$this->pembayaran->insert($data);

		$data1 = [
			'status' => 1
		];
		$this->tagihan->update($data1, $id_tagihan);

		$this->db->delete('bukti_pembayaran', ['id_bukti' => $bukti->id_bukti]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran berhasil</div>');
		redirect('pembayaran');
	}

	public function cetak()
	{
		$data['pembayaran'] = $this->pembayaran->get();
	 	$this->load->view('pembayaran/cetak', $data);	
	}



}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */