<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$email = $this->session->userdata('email');
		if(empty($logged_in && $email))
		{
			redirect('auth');
		}
	}

	public function index()
	{
		$data['page'] = 'dashboard/index';
	 	$this->load->view('templates/content', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */