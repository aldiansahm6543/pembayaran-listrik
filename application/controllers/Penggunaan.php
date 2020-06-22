<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan extends CI_Controller {

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
		$this->load->model('pelanggan_model', 'pelanggan');
	}

	public function index()
	{
		$this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'trim|required');
		$this->form_validation->set_rules('bulan', 'Bulan', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('meterawal', 'Meter awal', 'trim|required');
		$this->form_validation->set_rules('meterakhir', 'Meter akhir', 'trim|required');
	 	if ($this->form_validation->run() == TRUE) {
	 		$data = [
	 			'id_pelanggan' => $this->input->post('id_pelanggan'),
	 			'bulan' => $this->input->post('bulan'),
	 			'tahun' => $this->input->post('tahun'),
	 			'meterawal' => $this->input->post('meterawal'),
	 			'meterakhir' => $this->input->post('meterakhir')
	 		];
	 		$this->penggunaan->insert($data);
	 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
	 		redirect('penggunaan');
	 	} else {
			$data['page'] = 'penggunaan/index';
			$data['penggunaan'] = $this->penggunaan->get();
			$data['pelanggan'] = $this->pelanggan->get();
		 	$this->load->view('templates/content', $data);
	 	}
	}

	public function buatTagihan()
	{
			$id_penggunaan = $this->input->post('id_penggunaan');
			$data = [
				'id_pelanggan' => $this->input->post('id_pelanggan'),
				'id_penggunaan' => $this->input->post('id_penggunaan'),
				'bulan' => $this->input->post('bulan'),
				'tahun' => $this->input->post('tahun'),
				'jumlahmeter' => $this->input->post('jumlahmeter'),
				'status' => 0
			];
			$data1 = [
				'status' => 1
			];
			$this->tagihan->insert($data);
			$this->penggunaan->update($data1, $id_penggunaan);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tagihan berhasil ditambahkan</div>');
			redirect('tagihan');
	}

	public function edit()
	{
		$this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'trim|required');
		$this->form_validation->set_rules('bulan', 'Bulan', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('meterawal', 'Meter awal', 'trim|required');
		$this->form_validation->set_rules('meterakhir', 'Meter akhir', 'trim|required');
	 	if ($this->form_validation->run() == TRUE) {
	 		$id_penggunaan = $this->input->post('id_penggunaan');
	 		$data = [
	 			'id_pelanggan' => $this->input->post('id_pelanggan'),
	 			'bulan' => $this->input->post('bulan'),
	 			'tahun' => $this->input->post('tahun'),
	 			'meterawal' => $this->input->post('meterawal'),
	 			'meterakhir' => $this->input->post('meterakhir')
	 		];
	 		$this->penggunaan->update($data, $id_penggunaan);
	 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diedit</div>');
	 		redirect('penggunaan');
	 	} else {
			$data['page'] = 'penggunaan/index';
			$data['penggunaan'] = $this->penggunaan->get();
			$data['pelanggan'] = $this->pelanggan->get();
		 	$this->load->view('templates/content', $data);
	 	}
	}

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */