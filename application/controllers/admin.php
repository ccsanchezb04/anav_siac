<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('adminMod');
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
		$data['adn'] = $this->adminMod->admin();	
		$data['inst'] = $this->adminMod->inst();	
		$data['dir'] = $this->adminMod->direc();	
		$this->load->view('layout/header');
		$this->load->view('admin/user', $data);
		$this->load->view('layout/user_search');
		$this->load->view('layout/footer');
	}

	public function programas()
	{
		$data['prog'] = $this->adminMod->programas();	
		$this->load->view('layout/header');
		$this->load->view('admin/programs', $data);
		$this->load->view('layout/footer');
	}

	public function estudiantes_inscritos($prog)
	{
		$data['stuReg'] = $this->adminMod->studentReg($prog);
		$data['program'] = $this->adminMod->lstProg($prog);		
		$this->load->view('layout/header');
		$this->load->view('admin/studentRegister', $data);
		$this->load->view('layout/user_search');
		$this->load->view('layout/footer');
	}

	public function estudiantes_matriculados($grupo)
	{
		$data['stuEnr'] = $this->adminMod->studentEnr($grupo);
		$data['group'] = $this->adminMod->lstGrupo($grupo);		 
		$this->load->view('layout/header');
		$this->load->view('admin/studentEnrollment', $data);
		$this->load->view('layout/user_search');
		$this->load->view('layout/footer');
	}	

	public function grupos($prog)
	{
		$data['group'] = $this->adminMod->grupos($prog);	
		$data['program'] = $this->adminMod->lstProg($prog);
		$this->load->view('layout/header');
		$this->load->view('admin/groups', $data);
		$this->load->view('layout/footer');
	}

	public function materias($prog)
	{
		$data['subj'] = $this->adminMod->materias($prog);
		$data['program'] = $this->adminMod->lstProg($prog);	
		$this->load->view('layout/header');
		$this->load->view('admin/subject', $data);
		$this->load->view('layout/footer');
	}

	public function asignaciones($prog)
	{
		$data['asig'] = $this->adminMod->asig($prog);
		$data['program'] = $this->adminMod->lstProg($prog);	
		$this->load->view('layout/header');
		$this->load->view('admin/assignment', $data);
		$this->load->view('layout/footer');
	}

	public function calificaciones($grupo)
	{
		$data['calif'] = $this->adminMod->califiGroup($grupo);	
		$data['group'] = $this->adminMod->lstGrupo($grupo);	
		$this->load->view('layout/header');
		$this->load->view('admin/qualification', $data);
		$this->load->view('layout/footer');
	}

	public function busquedaUsuarios()
	{
		if ($_POST) {
			$dato = $_POST['dato'];
		}		
		$data['row'] = $this->adminMod->buscarUsuario($dato);
		$this->load->view('layout/content_info', $data);
	}

	public function existenciaUsuario()
	{
		if ($_POST) {
			$dato = $_POST['dato'];
		}
		$data['row'] = $this->adminMod->existenciaUsuario($dato);
		$this->load->view('layout/menssage', $data);
	}

	public function updAdmin($usua_id)
	{
		if ($_POST) {
			$this->adminMod->adminUpd($usua_id);
		}
		$data['updUs'] = $this->adminMod->lstUser($usua_id);
		$this->load->view('layout/header');		
		$this->load->view('admin/users/adminUpd', $data);		
		$this->load->view('layout/footer');
	}
	
	public function busquedaEstudiantes()
	{
		if ($_POST) {
			$dato = $_POST['dato'];
		}
		$data['row'] = $this->adminMod->buscarEstudiante($dato);		
		$this->load->view('layout/content_info', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */