<?php 
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view($page, isset($content) ? $content : '');
$this->load->view('templates/footer');

 ?>