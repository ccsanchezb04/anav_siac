<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Instructor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('instructorMod');
		$this->removeCache();	
		if ($this->session->userdata('userRole') == '') {
			echo "<script type='text/javascript'>";
            echo "alert('Debe iniciar sesión!');";
            echo "window.location.replace('".base_url()."');";
            echo "</script>";
		}
	}

	public function index()
	{
		$data['inst'] = $this->instructorMod->inst();	
		$this->load->view('layout/header');
		$this->load->view('instructor/instructor', $data);
		$this->load->view('layout/footer');
	}

	public function updInst($usua_id)
	{		
		if ($_POST) {
			$this->instructorMod->instUpd($usua_id);
		}
		$data['updUs'] = $this->instructorMod->lstUser($usua_id);
		$this->load->view('layout/header');		
		$this->load->view('instructor/user/instUpd', $data);		
		$this->load->view('layout/footer');
	}
}

/* End of file instructor.php */
/* Location: ./application/controllers/instructor.php */