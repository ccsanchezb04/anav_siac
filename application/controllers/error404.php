<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/error404');
		$this->load->view('layout/footer');
	}

}

/* End of file error404.php */
/* Location: ./application/controllers/error404.php */