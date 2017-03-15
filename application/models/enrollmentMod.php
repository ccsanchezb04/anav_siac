<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class EnrollmentMod extends CI_Model {

	public function grupo($prog)
	{
		$query = $this->db->get_where('anav_grupos', array('grupo_codigo' => $prog));
		return $query->result();
	}

	public function estaacad()
	{
		$query = $this->db->get('anav_estaacad');
		return $query->result();
	}

	public function addEnroll($usua_id, $prog)
	{
		$this->estu_idestaacad = 2;
		$this->estu_idusua = $usua_id;		
		$this->db->where('estu_idusua', $this->estu_idusua);
		if (!$this->db->update('anav_estudiantes', array('estu_idestaacad' => $this->estu_idestaacad))) {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al matricular el estudiante');";
            echo "</script>";
		}
		else{
			$estugrupo = array('estugrupos_id' 	  	=> $this->input->post('estugrupos_id'),
							   'estugrupos_idestu'  => $this->input->post('estugrupos_idestu'),
							   'estugrupos_idgrupo' => $this->input->post('estugrupos_idgrupo'));
			$this->db->insert('anav_estugrupos', $estugrupo);
			echo "<script type='text/javascript'>";
            echo "alert('El estudiante se ha matriculado correctamente');";
            echo "window.location.replace('".base_url()."admin/estudiantes_matriculados/".$prog."');";
            echo "</script>";
		}
	}

	public function estudiante($usua_id)
	{
		$this->estu_idusua = $usua_id;
		$this->db->select('*');
		$this->db->from('anav_usuarios');		
		$this->db->join('anav_estudiantes', 'estu_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = estu_idestado', 'INNER');	
		$this->db->join('anav_estaacad', 'estaacad_id = estu_idestaacad', 'INNER');	
		$this->db->join('anav_programas', 'prog_id = estu_idprog', 'INNER');	
		$this->db->join('anav_estugrupos', 'estugrupos_idestu = estu_id', 'INNER');	
		$this->db->join('anav_grupos', 'grupo_id = estugrupos_idgrupo', 'INNER');	
		$this->db->where('usua_tipo', 'EST');		
		$this->db->where('estu_idusua', $this->estu_idusua);		
		$this->db->where('estu_idestado', 1);						
		$this->db->order_by('usua_papellido', 'asc');
		
		$query = $this->db->get();
		return $query->result();
	}	

	public function updEnroll($usua_id)
	{
		$this->usua_id = $usua_id;
		if ($this->input->post('usua_password_new') == '') {			
			$password = $this->input->post('usua_password_old');
		}
		else {
			$password = md5($this->input->post('usua_password_new'));
		}

		$usuario = array('usua_id' 		  => $this->input->post('usua_id'),
						 'usua_doc' 	  => $this->input->post('usua_doc'),
						 'usua_pnombre'   => $this->input->post('usua_pnombre'),
						 'usua_papellido' => $this->input->post('usua_papellido'),
						 'usua_snombre'   => $this->input->post('usua_snombre'),
						 'usua_sapellido' => $this->input->post('usua_sapellido'),
						 'usua_email'	  => $this->input->post('usua_email'),
						 'usua_password'  => $password,
						 'usua_tipo' 	  => $this->input->post('usua_tipo'));

       	$this->db->where('usua_id', $this->usua_id);
		
        if (!$this->db->update('anav_usuarios', $usuario)) 
        {        	
            //echo mysql_error($query);
            echo "<script type='text/javascript'>";
            echo "alert('Problemas al actualizar el estudiante!');";
            echo "</script>";
        }
        else
        {

        	$usuaStud = array('estu_id' 		 => $this->input->post('estu_id'),
							  'estu_codigo'      => $this->input->post('estu_codigo'),
							  'estu_fingreso'    => $this->input->post('fingreso'),
							  'estu_telefono'    => $this->input->post('estu_tel'),
							  'estu_direccion'   => $this->input->post('estu_direccion'),
							  'estu_genero'      => $this->input->post('estu_genero'),
							  'estu_fnacimiento' => $this->input->post('fnacimiento'),
							  'estu_rh'          => $this->input->post('estu_rh'),
							  'estu_idestado'	 => $this->input->post('estu_idestado'),
							  'estu_idprog'		 => $this->input->post('estu_idprog'),
							  'estu_idestaacad'	 => $this->input->post('estu_idestaacad'),
							  'estu_idusua'      => $this->input->post('usua_id'));

        	$this->db->where('estu_idusua', $this->usua_id);

        	if ($this->db->update('anav_estudiantes', $usuaStud)) {

        		$estugrupo = array('estugrupos_id' 		=> $this->input->post('estugrupos_id'),
							  	   'estugrupos_idestu'  => $this->input->post('estu_id'),
							  	   'estugrupos_idgrupo' => $this->input->post('estugrupos_idgrupo'));

        		$this->db->where('estugrupos_idestu', $this->input->post('estu_id'));
        		$this->db->update('anav_estugrupos', $estugrupo);

	            echo "<script type='text/javascript'>";
	            echo "alert('El estudiante se actualizo con exito....!');";
	            echo "</script>";
        	}
        }
	}

	public function dltEnroll($id_estugru, $usua_id, $grupo)
	{
		$this->estugrupos_id = $id_estugru;
		$this->estu_id = $usua_id;
		$this->estu_idestaacad = 1;
		$this->db->where('estu_id', $this->estu_id);
		if (!$this->db->update('anav_estudiantes', array('estu_idestaacad' => $this->estu_idestaacad)))  {
			echo "<script type='text/javascript'>";
            echo "alert('Problemas al eliminar la matricula!');";
            echo "</script>";
		}
		else {
			$this->db->where('estugrupos_idestu', $this->estu_id);
			if (!$this->db->delete('anav_estugrupos')) {
				echo "<script type='text/javascript'>";
	            echo "alert('La matricula se elimino con exito....!');";
	            echo "window.location.replace('".base_url()."admin/estudiantes_matriculados/".$grupo."');";
	            echo "</script>";
			}
		}
	}
}

/* End of file enrollmentMod.php */
/* Location: ./application/models/enrollmentMod.php */