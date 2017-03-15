<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('userMod');
		$this->removeCache();
		if ($this->session->userdata('userRole') == '') {
			echo "<script type='text/javascript'>";
            echo "alert('Debe iniciar sesión!');";
            echo "window.location.replace('".base_url()."');";
            echo "</script>";
		}
	}

	public function addUser()
	{		
		if ($_POST) {
			$this->userMod->userAdd();
		}
		$this->load->view('layout/header');		
		$this->load->view('admin/users/userAdd');		
		$this->load->view('layout/footer');
	}

	public function lstUser($usua_id)
	{
		$data['lstUs'] = $this->userMod->lstUser($usua_id);
		$data['lstAd'] = $this->userMod->lstAdmin($usua_id);
		$data['lstIn'] = $this->userMod->lstInst($usua_id);
		$data['lstDr'] = $this->userMod->lstDirec($usua_id);
		$this->load->view('layout/header');		
		$this->load->view('admin/users/userlst', $data);		
		$this->load->view('layout/footer');
	}

	public function updUser($usua_id)
	{		
		if ($_POST) {
			$this->userMod->userUpd($usua_id);
		}
		$data['updUs'] = $this->userMod->lstUser($usua_id);
		$data['updAd'] = $this->userMod->lstAdmin($usua_id);
		$data['updIn'] = $this->userMod->lstInst($usua_id);
		$data['updDr'] = $this->userMod->lstDirec($usua_id);
		$this->load->view('layout/header');		
		$this->load->view('admin/users/userUpd', $data);		
		$this->load->view('layout/footer');
	}

	public function actUser($usua_id, $user)
	{		
		$this->userMod->act_user($usua_id, $user);
	}

	public function inaUser($usua_id, $user)
	{		
		$this->userMod->inact_user($usua_id, $user);
	}

	public function dltUser($usua_id, $user)
	{
		$this->userMod->dltUser($usua_id, $user);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */