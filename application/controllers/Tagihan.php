<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$email = $this->session->userdata('email');
		if(empty($logged_in && $email))
		{
			redirect('auth');
		}
		$this->load->model('tagihan_model', 'tagihan');
		$this->load->model('pembayaran_model', 'pembayaran');
	}

	public function index()
	{
		$data['page'] = 'tagihan/index';
		$data['tagihan'] = $this->tagihan->get();
	 	$this->load->view('templates/content', $data);
	}

	public function bayar()
	{
		$id_tagihan = $this->input->post('id_tagihan');
		$data = [
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'tanggal' => $this->input->post('tanggal'),
			'bulanbayar' => $this->input->post('bulanbayar'),
			'biayaadmin' => $this->input->post('biayaadmin'),
			'totalbayar' => $this->input->post('totalbayar')
		];
		$data1 = [
			'status' => 1
		];
		$this->pembayaran->insert($data);
		$this->tagihan->update($data1, $id_tagihan);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran berhasil</div>');
		redirect('pembayaran');
	}

}

/* End of file Tagihan.php */
/* Location: ./application/controllers/Tagihan.php */