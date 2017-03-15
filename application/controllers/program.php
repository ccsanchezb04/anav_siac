<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Program extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('programMod');
			$this->removeCache();
			if ($this->session->userdata('userRole') == '') {
				echo "<script type='text/javascript'>";
	            echo "alert('Se sesión ha vencido o caducado, debe iniciar sesión de nuevo!');";
	            echo "window.location.replace('".base_url()."');";
	            echo "</script>";
			}
		}

		public function addProg()
		{
			if ($_POST) {
				$this->programMod->addProg();				
			}
			$this->load->view('layout/header');		
			$this->load->view('admin/programs/progAdd');		
			$this->load->view('layout/footer');
		}

		public function lstProg($prog_id)
		{
			$data['prog'] = $this->programMod->lstProg($prog_id);
			$this->load->view('layout/header');		
			$this->load->view('admin/programs/progLst', $data);		
			$this->load->view('layout/footer');
		}

		public function updProg($prog_id)
		{
			if ($_POST) {
				$this->programMod->updProg($prog_id);	
			}
			$data['prog'] = $this->programMod->lstProg($prog_id);
			$this->load->view('layout/header');		
			$this->load->view('admin/programs/progUpd', $data);		
			$this->load->view('layout/footer');
		}

		public function dltProg($prog_id)
		{
			$this->programMod->dltProg($prog_id);
		}
	
	}
	
	/* End of file program.php */
	/* Location: ./application/controllers/program.php */	