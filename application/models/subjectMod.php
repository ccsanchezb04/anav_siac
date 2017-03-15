<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class SubjectMod extends CI_Model {

	var $mate_id 		= '';
	var $mate_nombre 	= '';
	var $mate_codigo	= '';
	var $mate_idprog 	= '';
	var $mate_idestado 	= '';

	public function programas()
	{
		$query = $this->db->get('anav_programas');
		return $query->result();
	}

	public function lstProg($grupo)
	{
		$query = $this->db->get_where('anav_programas', array('prog_codigo' => $grupo));
		return $query->result();
	}

	public function addSubj()
	{
		$materia = array('mate_id'	 	 => $this->input->post('mate_id'),
					  	 'mate_codigo'   => $this->input->post('mate_codigo'),
					  	 'mate_nombre'	 => $this->input->post('mate_nombre'),
					  	 'mate_horas'    => $this->input->post('mate_horas'),
					  	 'mate_idprog'   => $this->input->post('mate_idprog'),
					  	 'mate_idestado' => $this->input->post('mate_idestado'));

		if (!$this->db->insert('anav_materias', $materia))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al adicionar la materia!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('La materia se adiciono con exito....!');";
            echo "</script>";
		}
	}

	public function lstSubj($id)
	{
		$this->mate_id = $id;
		$query = $this->db->get_where('anav_materias', array('mate_id' => $this->mate_id));
		return $query->result();
	}

	public function updSubj($id)
	{
		$this->mate_id	= $id;

		$mate = array('mate_id' 	  => $this->input->post('mate_id'),
					  'mate_codigo'   => $this->input->post('mate_codigo'),
					  'mate_nombre'	  => $this->input->post('mate_nombre'),
					  'mate_horas'    => $this->input->post('mate_horas'),
					  'mate_idprog'   => $this->input->post('mate_idprog'),
					  'mate_idestado' => $this->input->post('mate_idestado'));

		$this->db->where('mate_id', $this->mate_id);

		if (!$this->db->update('anav_materias', $mate))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al modificar la materia!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('La materia se modifico con exito....!');";
            echo "</script>";
		}
	}

	public function dltSubj($id,$grupo)
	{
		$this->mate_id = $id;
		$this->db->where('mate_id', $this->mate_id);
		if (!$this->db->delete('anav_materias'))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al eliminar la materia!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('La materia se elimino con exito....!');";
            echo "window.location.replace('".base_url()."admin/materias/".$grupo."');";
            echo "</script>";
		}
	}
}

/* End of file SubjMod.php */
/* Location: ./application/models/SubjMod.php */