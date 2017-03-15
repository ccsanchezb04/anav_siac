<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Estudiante extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('estudianteMod');
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
		$data['calif'] = $this->estudianteMod->estu();	
		$data['grupo'] = $this->estudianteMod->grupo();
		$this->load->view('layout/header');
		$this->load->view('estudiante/calificaciones', $data);
		// $this->load->view('layout/user_search');
		$this->load->view('layout/footer');
	}

	public function updEstu($usua_id)
	{
		if ($_POST) {
			$this->estudianteMod->estuUpd($usua_id);
		}
		$data['updUs'] = $this->estudianteMod->lstUser($usua_id);
		$this->load->view('layout/header');		
		$this->load->view('estudiant/users/estuUpd', $data);		
		$this->load->view('layout/footer');
	}

}

/* End of file estudiante.php */
/* Location: ./application/controllers/estudiante.php */