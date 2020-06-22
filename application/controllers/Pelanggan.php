<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$email = $this->session->userdata('email');
		if(empty($logged_in && $email))
		{
			redirect('auth');
		}
		$this->load->model('pelanggan_model', 'pelanggan');
		$this->load->model('tarif_model', 'tarif');
	}

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('nometer', 'Nomor meter', 'trim|required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kodetarif', 'Tarif', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'nama' => $this->input->post('nama'),
				'nometer' => $this->input->post('nometer'),
				'alamat' => $this->input->post('alamat'),
				'kodetarif' => $this->input->post('kodetarif')
 			];
 			$this->pelanggan->insert($data);
	 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
	 		redirect('pelanggan');
		} else {
			$data['page'] = 'pelanggan/index';
			$data['pelanggan'] = $this->pelanggan->get();
			$data['tarif'] = $this->tarif->get();
		 	$this->load->view('templates/content', $data);
		}
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */