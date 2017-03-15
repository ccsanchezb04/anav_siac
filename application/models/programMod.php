<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ProgramMod extends CI_Model {

	public function addProg()
	{
		$prog = array('prog_id' 		=> $this->input->post('prog_id'),
					   'prog_codigo' 	=> $this->input->post('prog_codigo'),
					   'prog_nombre'	=> $this->input->post('prog_nombre'),
					   'prog_idestado' 	=> $this->input->post('prog_idestado'));

		if (!$this->db->insert('anav_programas', $prog))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al adicionar el programa!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('El programa se adiciono con exito....!');";
            echo "</script>";
		}
	}

	public function lstProg($id)
	{
		$this->prog_id	= $id;
		$query = $this->db->get_where('anav_programas', array('prog_id' => $this->prog_id));
		return $query->result();
	}

	public function updProg($id)
	{
		$this->prog_id	= $id;

		$prog = array('prog_id' 	  => $this->input->post('prog_id'),
					  'prog_codigo'   => $this->input->post('prog_codigo'),
					  'prog_nombre'	  => $this->input->post('prog_nombre'),
					  'prog_idestado' => $this->input->post('prog_idestado'));

		$this->db->where('prog_id', $this->prog_id);

		if (!$this->db->update('anav_programas', $prog))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al modificar el programa!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('El programa se modifico con exito....!');";
            echo "</script>";
		}
	}

	public function dltProg($id)
	{
		$this->prog_id = $id;
		$this->db->where('prog_id', $this->prog_id);
		if (!$this->db->delete('anav_programas'))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al eliminar el programa!');";
            echo "</script>";
		}
		else {
			echo "<script type='text/javascript'>";
            echo "alert('El programa se elimino con exito....!');";
            echo "window.location.replace('".base_url()."admin/grupos');";
            echo "</script>";
		}
	}

}

/* End of file programMod.php */
/* Location: ./application/models/programMod.php */