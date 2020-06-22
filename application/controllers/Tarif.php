<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$email = $this->session->userdata('email');
		if(empty($logged_in && $email))
		{
			redirect('auth');
		}
		$this->load->model('tarif_model', 'tarif');
	}

	public function index()
	{
		$this->form_validation->set_rules('kodetarif', 'Kode tarif', 'trim|required');
		$this->form_validation->set_rules('daya', 'Daya', 'trim|required');
		$this->form_validation->set_rules('tarifperkwh', 'Tarif', 'trim|required');
	 	if ($this->form_validation->run() == TRUE) {
	 		$data = [
	 			'kodetarif' => $this->input->post('kodetarif'),
	 			'daya' => $this->input->post('daya'),
	 			'tarifperkwh' => $this->input->post('tarifperkwh')
	 		];
	 		$this->tarif->insert($data);
	 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
	 		redirect('tarif');
	 	} else {
			$data['page'] = 'tarif/index';
			$data['tarif'] = $this->tarif->get();
		 	$this->load->view('templates/content', $data);
		 }
	}
	public function delete($id)
	{
		$this->tarif->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
		redirect('tarif'); 	
	}

}

/* End of file Tarif.php */
/* Location: ./application/controllers/Tarif.php */