<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Directivo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('directivoMod');
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
		$data['adn'] = $this->directivoMod->admin();	
		$data['inst'] = $this->directivoMod->inst();		
		$this->load->view('layout/header');
		$this->load->view('directivo/directivo', $data);
		$this->load->view('layout/user_search');
		$this->load->view('layout/footer');
	}

	public function estudiantes($grupo)
	{
		$data['calif'] = $this->directivoMod->califiGroup($grupo);	
		$data['group'] = $this->directivoMod->lstGrupo($grupo);	
		$this->load->view('layout/header');
		$this->load->view('directivo/estudiantes', $data);
		$this->load->view('layout/user_search');
		$this->load->view('layout/footer');
	}

	public function lstCalif($estu_id,$grupo)
	{
		$data['calif'] = $this->directivoMod->lstCalif($estu_id);
		$data['grupo'] = $this->directivoMod->grupo($grupo);
		$this->load->view('layout/header');
		$this->load->view('directivo/qualification/qualificationLst', $data);
		$this->load->view('layout/footer');
	}

	public function updDirec($usua_id)
	{
		if ($_POST) {
			$this->directivoMod->direcUpd($usua_id);
		}
		$data['updUs'] = $this->directivoMod->lstUser($usua_id);
		$this->load->view('layout/header');		
		$this->load->view('directivo/user/direcUpd', $data);		
		$this->load->view('layout/footer');
	}

}

/* End of file directivo.php */
/* Location: ./application/controllers/directivo.php */