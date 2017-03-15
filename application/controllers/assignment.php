<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Assignment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('assignmentMod');
		$this->removeCache();	
		if ($this->session->userdata('userRole') == '') {
			echo "<script type='text/javascript'>";
            echo "alert('Debe iniciar sesión!');";
            echo "window.location.replace('".base_url()."');";
            echo "</script>";
		}
	}


	public function validarProg()
	{
		if ($_POST) {
			$dato = $_POST['dato'];
		}
		$data['group'] = $this->assignmentMod->validarGrupo($dato);
		$data['subj'] = $this->assignmentMod->validarMateria($dato);
		$this->load->view('layout/asig_selects', $data);
	}

	public function validarAsig()
	{
		if ($_POST) {
			$grupo = $_POST['group'];
			$materia = $_POST['subject'];
		}
		$data['row'] = $this->assignmentMod->validarAsig($grupo,$materia);
		$this->load->view('layout/menssage_asig', $data);
	}

	public function addAsig($grupo)
	{
		if ($_POST) { 			
			$this->assignmentMod->addAsig();
		}	
		// $data['grupo'] = $this->assignmentMod->grupos(/*$dato*/);
		// $data['materia'] = $this->assignmentMod->materias(/*$dato*/);
		$data['inst'] = $this->assignmentMod->instructor();
		$data['pg'] = $this->assignmentMod->programas();
		$data['program'] = $this->assignmentMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/assignment/assignmentAdd', $data);		
		$this->load->view('layout/footer');
	}

	public function lstAsig($id,$grupo)
	{
		$data['pg'] = $this->assignmentMod->programas();
		$data['asigLst'] = $this->assignmentMod->lstAsig($id);
		$data['program'] = $this->assignmentMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/assignment/assignmentLst', $data);		
		$this->load->view('layout/footer');
	}

	public function updAsig($id,$prog,$grupo)
	{
		if ($_POST) { 			
			$this->assignmentMod->updAsig($id);
		}
		$data['pg'] = $this->assignmentMod->prog($prog);
		$data['group'] = $this->assignmentMod->grupos($prog);
		$data['subj'] = $this->assignmentMod->materias($prog);
		$data['inst'] = $this->assignmentMod->instructor();
		$data['asigUpd'] = $this->assignmentMod->lstAsig($id);
		$data['program'] = $this->assignmentMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/assignment/assignmentUpd', $data);		
		$this->load->view('layout/footer');
	}

	public function dltAsig($id,$grupo)
	{
		$this->assignmentMod->dltAsig($id);
	}
}

/* End of file assignment.php */
/* Location: ./application/controllers/assignment.php */