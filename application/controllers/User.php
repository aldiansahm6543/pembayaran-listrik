<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$login = $this->session->userdata('login');
		$id = $this->session->userdata('id');
		if(empty($login && $id))
		{
			redirect('home');
		}
		$this->load->model('tagihan_model', 'tagihan');
		$this->load->model('Pembayaran_model', 'pembayaran');
	}

	public function index()
	{
		$data['page'] = 'user/index';
		$data['tagihan'] = $this->tagihan->getUser();
		$data['bukti'] = $this->tagihan->bukti();
	 	$this->load->view('templates/content', $data);

	}

	public function uploadpembayaran()
	{
			if(($_FILES['gambar']['name'])){
				$this->load->library('upload');

				$config['upload_path'] = './assets/images/bukti-bayar/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2048';
				$config['encrypt_name'] = FALSE; 
				
				$this->upload->initialize($config);
				if ( $this->upload->do_upload('gambar')){
					$gbr = $this->upload->data();
					 $config['image_library']='gd2';
		            $config['source_image']='./assets/images/bukti-bayar/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '60%';
		            $config['width']= 710;
		            $config['height']= 420;
		            $config['new_image']= './assets/images/bukti-bayar/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();
					$data = [
						'tagihan_id' => $this->input->post('id_tagihan'),
						'nama' => $this->input->post('nama'),
						'bank' => $this->input->post('bank'),
						'norek' => $this->input->post('norek'),
						'bank_tuju' => $this->input->post('bank_tuju'),
						'gambar' => $gbr['file_name']

					];
					 $this->db->insert('bukti_pembayaran', $data);
					 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil</div>');
					 redirect('user');
				}
				else{
					 echo $this->upload->dispay_errors();
				}
			}
	}

	public function historyPembayaran()
	{
		$data['page'] = 'user/history_pembayaran';
		$data['pembayaran'] = $this->pembayaran->getHistory();
	 	$this->load->view('templates/content', $data);

	}

	public function logout()
	{
		session_destroy();
		redirect('home');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */