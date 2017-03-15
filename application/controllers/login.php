<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends CI_Controller
	{		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('loginMod');
			$this->removeCache();
		}

		public function index()
		{
			$this->doc 		= $this->input->post('docuemnto');
			$this->password = md5($this->input->post('contrasena'));
			switch ($this->session->userdata('userRole')) 
			{
				case 'ADMIN':
					$adminEst = $this->session->userdata('adminEst');
					if ($adminEst == 1) {
						redirect(base_url().'admin', 'refresh');
					}
					else{
						echo "<script>";
						echo "alert('¡Su estado actual es: Inactivo, por lo tanto no puede iniciar sesión!');";
						echo "window.location.replace('".base_url()."login/close')";
						echo "</script>";
					}
					break;

				case 'INST':
					$intsEst = $this->session->userdata('intsEst');
					if ($intsEst  == 1) {
						redirect(base_url().'instructor', 'refresh');
					}
					else{
						echo "<script>";
						echo "alert('¡Su estado actual es: Inactivo, por lo tanto no puede iniciar sesión!');";
						echo "window.location.replace('".base_url()."login/close')";
						echo "</script>";
					}
					break;

				case 'EST':
					$estuEst = $this->session->userdata('estuEst');
					if ($estuEst  == 1) {
						redirect(base_url().'estudiante', 'refresh');
					}
					else{
						echo "<script>";
						echo "alert('¡Su estado actual es: Inactivo, por lo tanto no puede iniciar sesión!');";
						echo "window.location.replace('".base_url()."login/close')";
						echo "</script>";
					}
					break;

				case 'DIREC':
					$direcEst = $this->session->userdata('direcEst');
					if ($direcEst == 1) {
						redirect(base_url().'directivo', 'refresh');
					}
					else{
						echo "<script>";
						echo "alert('¡Su estado actual es: Inactivo, por lo tanto no puede iniciar sesión!');";
						echo "window.location.replace('".base_url()."login/close')";
						echo "</script>";
					}
					break;

				default:
					if (($this->doc!= '' && $this->password!= '')||($this->doc!= 0 && $this->password!= 0)) {
						$this->loginMod->validacion();
					}					
					break;
			}
			$this->load->view('layout/header');
			$this->load->view('login');
			$this->load->view('layout/footer');
		}

		public function close()
		{
			$this->session->sess_destroy();
		    redirect(base_url(),'refresh');
		}
	}

 ?>