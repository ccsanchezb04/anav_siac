<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('subjectMod');
		$this->removeCache();
		if ($this->session->userdata('userRole') == '') {
			echo "<script type='text/javascript'>";
            echo "alert('Debe iniciar sesión!');";
            echo "window.location.replace('".base_url()."');";
            echo "</script>";
		}
	}

	public function addSubj($grupo)
	{
		if ($_POST) {
			$this->subjectMod->addSubj();
		}
		$data['pg'] = $this->subjectMod->programas();
		$data['program'] = $this->subjectMod->lstProg($grupo);
		$this->load->view('layout/header');		
		$this->load->view('admin/subject/subjectAdd', $data);		
		$this->load->view('layout/footer');
	}

	public function lstSubj($id,$grupo)
	{
		$data['pg'] = $this->subjectMod->programas();
		$data['materia'] = $this->subjectMod->lstSubj($id);
		$data['program'] = $this->subjectMod->lstProg($grupo);		
		$this->load->view('layout/header');		
		$this->load->view('admin/subject/subjectLst', $data);		
		$this->load->view('layout/footer');
	}

	public function updSubj($id,$grupo)
	{
		if ($_POST) {
			$this->subjectMod->updSubj($id);
		}
		$data['pg'] = $this->subjectMod->programas();
		$data['materia'] = $this->subjectMod->lstSubj($id);
		$data['program'] = $this->subjectMod->lstProg($grupo);		
		$this->load->view('layout/header');		
		$this->load->view('admin/subject/subjectUpd', $data);		
		$this->load->view('layout/footer');
	}

	public function dltSubj($id,$grupo)
	{
		$this->subjectMod->dltSubj($id,$grupo);
	}
}

/* End of file subject.php */
/* Location: ./application/controllers/subject.php */