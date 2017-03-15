<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class AssignmentMod extends CI_Model {

	var $asig_id;
	var $asig_idprog;
	var $asig_idgrupo;
	var $asig_idmate;
	var $asig_idinst;
	var $asig_idestado;

	public function grupos($prog)
	{
		$query = $this->db->get_where('anav_grupos', array('grupo_idprog' => $prog));
		// $query = $this->db->get('anav_grupos');
		return $query->result();
	}

	public function materias($prog)
	{
		$query = $this->db->get_where('anav_materias', array('mate_idprog' => $prog));
		// $query = $this->db->get('anav_materias');
		return $query->result();
	}
	public function prog($prog)
	{
		$query = $this->db->get_where('anav_programas', array('prog_id' => $prog));
		return $query->result();
	}

	public function programas()
	{
		$query = $this->db->get_where('anav_programas', array('prog_idestado' => 1));
		return $query->result();
	}

	public function lstProg($grupo)
	{
		$query = $this->db->get_where('anav_programas', array('prog_codigo' => $grupo));
		return $query->result();
	}

	public function validarAsig($grupo,$materia)
	{
		$queryExist = "SELECT COUNT(*) AS total FROM anav_asignaciones 
					   WHERE asig_idgrupo = ".$grupo." AND asig_idmate = ".$materia.";";
		
		$query = $this->db->query($queryExist);
		return $query->result();
	}

	public function instructor()
	{
		$this->db->select('inst_id, usua_pnombre, usua_papellido');
		$this->db->from('anav_instructores');		
		$this->db->join('anav_usuarios', 'usua_id = inst_idusua', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = inst_idestado', 'INNER');
		$this->db->where('usua_tipo', 'INST');			
		$this->db->where('inst_idestado', 1);
		$this->db->order_by('usua_papellido', 'asc');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function validarGrupo($dato)
	{
		$query = $this->db->get_where('anav_grupos', array('grupo_idprog' => $dato));
		return $query->result();
	}

	public function validarMateria($dato)
	{
		$query = $this->db->get_where('anav_materias', array('mate_idprog' => $dato));
		return $query->result();
	}

	public function addAsig()
	{
		$asig = array('asig_id'	   	   => $this->input->post('asig_id'),
					   'asig_idprog'   => $this->input->post('asig_idprog'),
					   'asig_idgrupo'  => $this->input->post('asig_idgrupo'),
					   'asig_idmate'   => $this->input->post('asig_idmate'),
					   'asig_idinst'   => $this->input->post('asig_idinst'),
					   'asig_idestado' => $this->input->post('asig_idestado'));

		if (!$this->db->insert('anav_asignaciones', $asig))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al adicionar la asignacion!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('La asignacion se adiciono con exito....!');";
            echo "</script>";
		}
	}

	public function lstAsig($id)
	{
		$this->asig_id = $id;

		$this->db->select('*');
		$this->db->from('anav_asignaciones');		
		$this->db->join('anav_grupos', 'grupo_id = asig_idgrupo', 'INNER');			
		$this->db->join('anav_materias', 'mate_id = asig_idmate', 'INNER');	
		$this->db->join('anav_instructores', 'inst_id = asig_idinst', 'INNER');	
		$this->db->join('anav_usuarios', 'usua_id = inst_idusua', 'INNER');		
		$this->db->join('anav_estados', 'esta_id = asig_idestado', 'INNER');
		$this->db->join('anav_programas', 'prog_id = asig_idprog', 'INNER');
		$this->db->where('asig_id', $this->asig_id);						
		$this->db->order_by('grupo_nombre', 'asc');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function updAsig($id)
	{
		$this->asig_id = $id;

		$asig = array('asig_id'	       => $this->input->post('asig_id'),
					   'asig_idprog'   => $this->input->post('asig_idprog'),
					   'asig_idgrupo'  => $this->input->post('asig_idgrupo'),
					   'asig_idmate'   => $this->input->post('asig_idmate'),
					   'asig_idinst'   => $this->input->post('asig_idinst'),
					   'asig_idestado' => $this->input->post('asig_idestado'));

		$this->db->where('asig_id', $this->asig_id);

		if (!$this->db->update('anav_asignaciones', $asig))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al modificar la asignacion!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('La asignacion se modifico con exito....!');";
            echo "</script>";
		}
	}

	public function dltAsig($id,$grupo)
	{
		$this->asig_id = $id;
		$this->db->where('asig_id', $this->asig_id);

		if (!$this->db->delete('anav_asignaciones'))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al eliminar la asignacion!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('La asignacion se elimino con exito....!');";
            echo "window.location.replace('".base_url()."admin/asignaciones/".$grupo."');";
            echo "</script>";
		}
	}

}

/* End of file assignmentMod.php */
/* Location: ./application/models/assignmentMod.php */