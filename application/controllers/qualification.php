<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Qualification extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('qualificationMod');
		$this->removeCache();
		if ($this->session->userdata('userRole') == '') {
			echo "<script type='text/javascript'>";
            echo "alert('Debe iniciar sesión!');";
            echo "window.location.replace('".base_url()."');";
            echo "</script>";
		}
	}

	public function lstCalif($estu_id,$grupo)
	{
		$data['calif'] = $this->qualificationMod->lstCalif($estu_id);
		$data['grupo'] = $this->qualificationMod->grupo($grupo);
		$this->load->view('layout/header');
		$this->load->view('admin/qualification/qualificationLst', $data);
		$this->load->view('layout/footer');
	}

	public function updCalif($estu_id,$grupo)
	{
		if ($_POST) {
			$cont = $this->input->post('contador');
			for ($i=1; $i <= $cont; $i++) { 
				
				$idCalif = $this->input->post("calif_id_$i");
				$idEstu = $this->input->post("calif_idestu_$i");
				$idMate = $this->input->post("calif_idmate_$i");

				$nota1 = $this->input->post("calif_nota1_$i");
				$nota2 = $this->input->post("calif_nota2_$i");
				$nota3 = $this->input->post("calif_nota3_$i");				
				$notaF = $this->input->post("calif_notaf_$i");

				$this->qualificationMod->updCalif($nota1, $nota2, $nota3, $notaF, $idCalif, $idEstu, $idMate);
				// $this->qualificationMod->updCalif($estu_id);
			}
			$cont = $cont+1;			
			if ($cont == $i) 
			{
				echo "<script type='text/javascript'>";
				echo "alert('La calificacion por estudiante se ha asignado con exito....!');";
				echo "window.location.replace('".base_url()."admin/calificaciones/".$grupo."');";
				echo "</script>";
			}
		}
		$data['calif'] = $this->qualificationMod->lstCalif($estu_id);
		$data['grupo'] = $this->qualificationMod->grupo($grupo);
		$this->load->view('layout/header');
		$this->load->view('admin/qualification/qualificationUpd', $data);
		$this->load->view('layout/footer');
	}

	public function calificacion($grupo, $materia, $asig)
	{
		if ($_POST) {
			var_dump($_POST);
			$cont = $this->input->post('contador');
			$idMate = $this->input->post("calif_idmate");
			for ($i=1; $i <= $cont; $i++) { 
				
				$idCalif = $this->input->post("calif_id_$i");
				$idEstu = $this->input->post("calif_idestu_$i");
				$estado = $this->input->post("estado_$i");

				$nota1 = $this->input->post("calif_nota1_$i");
				$nota2 = $this->input->post("calif_nota2_$i");
				$nota3 = $this->input->post("calif_nota3_$i");				
				$notaF = $this->input->post("calif_notaf_$i");

				if ($estado == "true") {
					$this->qualificationMod->updCalif($nota1, $nota2, $nota3, $notaF, $idCalif, $idEstu, $idMate);
				}
				else {
					$this->qualificationMod->addCalif($nota1, $nota2, $nota3, $notaF, $idCalif, $idEstu, $idMate);
				}
				
			}
			$cont = $cont+1;			
			if ($cont == $i) 
			{
				echo "<script type='text/javascript'>";
				echo "alert('La calificacion por grupos se ha asignado con exito....!');";
				echo "window.location.replace('".base_url()."instructor/');";
				echo "</script>";
			}
		}
		$data['calif'] = $this->qualificationMod->listEst($grupo,$materia);
		$data['asig'] = $this->qualificationMod->asig($asig);
		$this->load->view('layout/header');
		$this->load->view('instructor/qualification/qualification', $data);
		$this->load->view('layout/footer');
	}
}

/* End of file qualification.php */
/* Location: ./application/controllers/qualification.php */