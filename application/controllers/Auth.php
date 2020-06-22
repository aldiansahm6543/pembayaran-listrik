<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/index');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$user = $this->db->get_where('login', ['email' => $email])->row_array();

		if ($user) {
			if ($password == $user['password']) {
				$data = [
					'logged_in' => TRUE,
					'nama' => $user['nama'],
					'email' => $user['email']
				];
				$this->session->set_userdata($data);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not register!</div>');
				redirect('auth');
		}
	}

	public function loginUser()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nometer', 'Nomor meter', 'trim|required');

		if ($this->form_validation->run() == TRUE ) {
			$nama = $this->input->post('nama');
			$nometer = $this->input->post('nometer');

			$pelanggan = $this->db->get_where('pelanggan', ['nometer' => $nometer])->row_array();
			if ($pelanggan) {
				if ($nama == $pelanggan['nama']) {
					if ($nometer == $pelanggan['nometer']) {
						$data = [
							'login' => TRUE,
							'nama' => $pelanggan['nama'],
							'id' => $pelanggan['id_pelanggan']
						];
						$this->session->set_userdata($data);
						redirect('user');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong nometer!</div>');
						redirect('home');
					} 
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama salah!</div>');
					redirect('home');
				} 
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pelanggan is not register!</div>');
				redirect('home');
			}
		} else {
			redirect('home');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */