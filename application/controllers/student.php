<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('studentMod');
		$this->removeCache();
		if ($this->session->userdata('userRole') == '') {
			echo "<script type='text/javascript'>";
            echo "alert('Debe iniciar sesión!');";
            echo "window.location.replace('".base_url()."');";
            echo "</script>";
		}
	}

	public function addStud($grupo)
	{		
		if ($_POST) {
			$this->studentMod->studAdd();
		}
		$data['prog'] = $this->studentMod->programas();
		$data['program'] = $this->studentMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/student/studAdd', $data);		
		$this->load->view('layout/footer');
	}

	public function lstStud($usua_id,$grupo)
	{
		$data['lstUs'] = $this->studentMod->lstUser($usua_id);
		$data['lstSt'] = $this->studentMod->lstStud($usua_id);
		$data['prog'] = $this->studentMod->programas();
		$data['estaacad'] = $this->studentMod->estaacad();
		$data['program'] = $this->studentMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/student/studLst', $data);		
		$this->load->view('layout/footer');
	}

	public function updStud($usua_id,$grupo)
	{		
		if ($_POST) {
			$this->studentMod->updStud($usua_id);
		}
		$data['lstUs'] = $this->studentMod->lstUser($usua_id);
		$data['lstSt'] = $this->studentMod->lstStud($usua_id);
		$data['prog'] = $this->studentMod->programas();
		$data['estaacad'] = $this->studentMod->estaacad();
		$data['program'] = $this->studentMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/student/studUpd', $data);		
		$this->load->view('layout/footer');
	}

	public function enrollment($usua_id,$prog,$grupo)
	{		
		$data['stud'] = $this->studentMod->student($usua_id);
		$data['group'] = $this->studentMod->grupo($prog);
		$data['program'] = $this->studentMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/enrollment/enrollAdd', $data);		
		$this->load->view('layout/footer');
	}

	public function lista_estudiantes($grupo)
	{
		$data['stud'] = $this->studentMod->lista_estudiantes($grupo);
		$this->load->view('layout/header');		
		$this->load->view('instructor/student/listaEstudiantes', $data);		
		$this->load->view('layout/footer');
	}

	public function dltStud($usua_id,$grupo)
	{
		$this->studentMod->dltStud($usua_id,$grupo);
	}

	public function estudiante($usua_id,$grupo)
	{
		$data['lstUs'] = $this->studentMod->lstUser($usua_id);
		$data['lstSt'] = $this->studentMod->lstStud($usua_id);
		$data['prog'] = $this->studentMod->programas();
		$data['estaacad'] = $this->studentMod->estaacad();
		$data['program'] = $this->studentMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/student/studLst', $data);		
		$this->load->view('layout/footer');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/stud.php */