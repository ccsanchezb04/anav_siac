<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('groupMod');
		$this->removeCache();
		if ($this->session->userdata('userRole') == '') {
			echo "<script type='text/javascript'>";
            echo "alert('Debe iniciar sesión!');";
            echo "window.location.replace('".base_url()."');";
            echo "</script>";
		}
	}

	public function validarGrupo()
	{
		if ($_POST) {
			$dato = $_POST['dato'];
		}
		$data['row'] = $this->groupMod->validarGrupo($dato);
		$this->load->view('layout/menssage_grupo', $data);
	}

	public function addGroup($grupo)
	{
		if ($_POST) {
			$this->groupMod->addGroup();
		}
		$data['pg'] = $this->groupMod->programas();
		$data['program'] = $this->groupMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/group/groupAdd', $data);		
		$this->load->view('layout/footer');
	}

	public function lstGroup($id,$grupo)
	{
		$data['pg'] = $this->groupMod->programas();
		$data['grupo'] = $this->groupMod->lstGroup($id);
		$data['program'] = $this->groupMod->lstProg($grupo);		
		$this->load->view('layout/header');		
		$this->load->view('admin/group/groupLst', $data);		
		$this->load->view('layout/footer');
	}

	public function updGroup($id,$grupo)
	{
		if ($_POST) {
			$this->groupMod->updGroup($id);
		}
		$data['pg'] = $this->groupMod->programas();
		$data['grupo'] = $this->groupMod->lstGroup($id);
		$data['program'] = $this->groupMod->lstProg($grupo);		
		$this->load->view('layout/header');		
		$this->load->view('admin/group/groupUpd', $data);		
		$this->load->view('layout/footer');
	}

	public function dltGroup($id,$grupo)
	{
		$this->groupMod->dltGroup($id,$grupo);
	}
}

/* End of file group.php */
/* Location: ./application/controllers/group.php */