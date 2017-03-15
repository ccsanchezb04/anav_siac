<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class QualificationMod extends CI_Model {

	var $calif_id 	  = '';
	var $calif_idestu = '';
	var $calif_idmate = '';
	var $calif_nota1  = '';
	var $calif_nota2  = '';
	var $calif_nota3  = '';
	var $calif_nota4  = '';

	public function lstCalif($estu_id)
	{
		$this->db->select('*');
		$this->db->from('anav_calificaciones');		
		$this->db->join('anav_materias', 'mate_id = calif_idmate', 'LEFT');					
		$this->db->join('anav_estudiantes', 'estu_id = calif_idestu', 'LEFT');		
		$this->db->join('anav_usuarios', 'usua_id = estu_idusua', 'LEFT');			
		$this->db->where('calif_idestu', $estu_id);	
		$this->db->where('mate_idestado', 1);		
		$this->db->where('estu_idestado', 1);		
		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function grupo($grupo)
	{
		$query = $this->db->get_where('anav_grupos', array('grupo_codigo' => $grupo));
		return $query->result();
	}

	public function addCalif($nota1, $nota2, $nota3, $notaF, $idCalif, $idEstu, $idMate)
	{
		$calif = array('calif_id' 	  =>$idCalif,
					   'calif_idestu' =>$idEstu,
					   'calif_idmate' =>$idMate,
					   'calif_nota1'  =>$nota1,
					   'calif_nota2'  =>$nota2,
					   'calif_nota3'  =>$nota3,
					   'calif_notaf'  =>$notaF);

		if (!$this->db->insert('anav_calificaciones', $calif)) {
			echo "<script type='text/javascript'>";
			echo "alert('Problemas al adicionar la calificacion!');";
			echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
			//echo "alert('El usuario se modifico con exito....!');";
			//echo "window.location.replace('".base_url()."Admin');";
			echo "</script>";
		}
	}

	public function updCalif($nota1, $nota2, $nota3, $notaF, $idCalif, $idEstu, $idMate)
	{
		$calif = array('calif_id' 	  =>$idCalif,
					   'calif_idestu' =>$idEstu,
					   'calif_idmate' =>$idMate,
					   'calif_nota1'  =>$nota1,
					   'calif_nota2'  =>$nota2,
					   'calif_nota3'  =>$nota3,
					   'calif_notaf'  =>$notaF);

		$this->db->where('calif_id', $idCalif);
		$this->db->where('calif_idestu', $idEstu);
		$this->db->where('calif_idmate', $idMate);

		if (!$this->db->update('anav_calificaciones', $calif)) {
			echo "<script type='text/javascript'>";
			echo "alert('Problemas al modificar la calificacion!');";
			echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
			//echo "alert('El usuario se modifico con exito....!');";
			//echo "window.location.replace('".base_url()."Admin');";
			echo "</script>";
		}
	}

	public function materia($materia)
	{
		$query = $this->db->get_where('anav_materias', array('mate_id' => $materia));
		return $query->result();
	}

	public function listEst($grupo,$materia)
	{
		$this->db->select('*');
		$this->db->from('anav_estugrupos');		
		$this->db->join('anav_grupos', 'grupo_id = estugrupos_idgrupo', 'LEFT');				
		$this->db->join('anav_estudiantes', 'estu_id = estugrupos_idestu', 'LEFT');				
		$this->db->join('anav_calificaciones', 'calif_idestu = estu_id', 'LEFT');				
		$this->db->join('anav_materias', 'estu_id = estugrupos_idestu', 'LEFT');				
		$this->db->join('anav_usuarios', 'usua_id = estu_idusua', 'LEFT');				
		$this->db->where('grupo_codigo', $grupo);		
		$this->db->where('mate_id', $materia);		
		$this->db->where('mate_idestado', 1);		
		$this->db->where('estu_idestado', 1);
		$this->db->order_by('usua_papellido', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function asig($asig)
	{
		$this->db->select('*');
		$this->db->from('anav_asignaciones');		
		$this->db->join('anav_grupos', 'grupo_id = asig_idgrupo', 'LEFT');			
		$this->db->join('anav_materias', 'mate_id = asig_idmate', 'LEFT');	
		$this->db->join('anav_instructores', 'inst_id = asig_idinst', 'LEFT');
		$this->db->where('asig_id', $asig);

		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file qualificationMod.php */
/* Location: ./application/models/qualificationMod.php */