<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class GroupMod extends CI_Model {

	var $grupo_id 		= '';
	var $grupo_nombre 	= '';
	var $grupo_codigo	= '';
	var $grupo_anio 	= '';
	var $grupo_idprog 	= '';
	var $grupo_idestado = '';

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

	public function validarGrupo($dato)
	{
		$queryExist = "SELECT COUNT(*) AS total FROM anav_grupos 
					   WHERE grupo_codigo = '".$dato."';";
		
		$query = $this->db->query($queryExist);
		return $query->result();
	}

	public function addGroup()
	{
		$grupo = array('grupo_id' 		=> $this->input->post('grupo_id'),
					   'grupo_codigo' 	=> $this->input->post('grupo_codigo'),
					   'grupo_nombre'	=> $this->input->post('grupo_nombre'),
					   'grupo_anio' 	=> $this->input->post('grupo_anio'),
					   'grupo_idprog' 	=> $this->input->post('grupo_idprog'),
					   'grupo_idestado' => $this->input->post('grupo_idestado'));

		if (!$this->db->insert('anav_grupos', $grupo))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al adicionar el grupo!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('El grupo se adiciono con exito....!');";
            echo "</script>";
		}
	}

	public function lstGroup($id)
	{
		$this->grupo_id	= $id;
		$query = $this->db->get_where('anav_grupos', array('grupo_id' => $this->grupo_id));
		return $query->result();
	}

	public function updGroup($id, $grupo)
	{
		$this->grupo_id	= $id;

		$grupo = array('grupo_id' 		=> $this->input->post('grupo_id'),
					   'grupo_codigo' 	=> $this->input->post('grupo_codigo'),
					   'grupo_nombre'	=> $this->input->post('grupo_nombre'),
					   'grupo_anio' 	=> $this->input->post('grupo_anio'),
					   'grupo_idprog' 	=> $this->input->post('grupo_idprog'),
					   'grupo_idestado' => $this->input->post('grupo_idestado'));

		$this->db->where('grupo_id', $this->grupo_id);

		if (!$this->db->update('anav_grupos', $grupo))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al modificar el grupo!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('El grupo se modifico con exito....!');";
            echo "</script>";
		}
	}

	public function dltGroup($id,$grupo)
	{
		$this->grupo_id = $id;
		$this->db->where('grupo_id', $this->grupo_id);
		if (!$this->db->delete('anav_grupos'))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al eliminar el grupo!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('El grupo se elimino con exito....!');";
            echo "window.location.replace('".base_url()."admin/grupos/".$grupo."');";
            echo "</script>";
		}
	}
}

/* End of file groupMod.php */
/* Location: ./application/models/groupMod.php */