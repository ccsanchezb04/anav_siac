<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Enrollment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('enrollmentMod');
		$this->removeCache();
		if ($this->session->userdata('userRole') == '') {
			echo "<script type='text/javascript'>";
            echo "alert('Debe iniciar sesión!');";
            echo "window.location.replace('".base_url()."');";
            echo "</script>";
		}
	}

	public function addEnroll($usua_id, $prog)
	{		
		if ($_POST) {
			$this->enrollmentMod->addEnroll($usua_id, $prog);
		}
	}

	public function lstEnroll($usua_id)
	{		
		// $data['mat'] = $this->enrollmentMod->matricula($usua_id);
		$data['est'] = $this->enrollmentMod->estudiante($usua_id);
		$this->load->view('layout/header');		
		$this->load->view('admin/enrollment/EnrollLst', $data);		
		$this->load->view('layout/footer');
	}

	public function updEnroll($usua_id,$prog)
	{		
		if ($_POST) {
			$this->enrollmentMod->updEnroll($usua_id);
		}

		$data['est'] = $this->enrollmentMod->estudiante($usua_id);		
		$data['group'] = $this->enrollmentMod->grupo($prog);		
		$data['estaacad'] = $this->enrollmentMod->estaacad($prog);		
		$this->load->view('layout/header');		
		$this->load->view('admin/enrollment/EnrollUpd', $data);		
		$this->load->view('layout/footer');
	}

	public function dltEnroll($id_estugru, $usua_id, $grupo)
	{
		$this->enrollmentMod->dltEnroll($id_estugru, $usua_id, $grupo);
	}
}

/* End of file enrollment.php */
/* Location: ./application/controllers/enrollment.php */