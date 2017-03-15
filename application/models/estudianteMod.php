<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class EstudianteMod extends CI_Model {

	public function estu()
	{
		$estu_id = $this->session->userdata('userId');
		
		$this->db->select('*');
		$this->db->from('anav_calificaciones');		
		$this->db->join('anav_materias', 'mate_id = calif_idmate', 'INNER');					
		$this->db->join('anav_estudiantes', 'estu_id = calif_idestu', 'INNER');		
		$this->db->join('anav_usuarios', 'usua_id = estu_idusua', 'INNER');			
		$this->db->where('estu_idusua', $estu_id);	
		$this->db->where('mate_idestado', 1);		
		$this->db->where('estu_idestado', 1);		
		
		$query = $this->db->get();
		return $query->result();
	}

	public function grupo()
	{
		$estu_id = $this->session->userdata('userId');

		$this->db->select('*');
		$this->db->from('anav_grupos');		
		$this->db->join('anav_programas', 'prog_id = grupo_idprog', 'INNER');			
		$this->db->join('anav_estugrupos', 'estugrupos_idgrupo = grupo_id', 'INNER');		
		$this->db->join('anav_estudiantes', 'estu_id = estugrupos_idestu', 'INNER');		
		$this->db->join('anav_usuarios', 'usua_id = estu_idusua', 'INNER');			
		$this->db->where('estu_idusua', $estu_id);	
		$this->db->where('grupo_idestado', 1);		
		
		$query = $this->db->get();
		return $query->result();
	}

	public function lstUser($usua_id)
	{
		$this->usua_id = $usua_id;
		$this->db->select('*');
		$this->db->from('anav_usuarios');		
		$this->db->join('anav_estudiantes', 'estu_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = estu_idestado', 'INNER');
		$this->db->where('usua_tipo', 'EST');		
		$this->db->where('usua_id', $this->usua_id);
		
		$query = $this->db->get();
		return $query->result();
	}

	public function estuUpd($usua_id)
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
            echo "alert('Problemas al actualizar los datos!');";
            echo "</script>";
        }
        else
        {
        	$this->db->select('usua_id');
			$this->db->from('anav_usuarios');		
			$this->db->where('usua_doc', $this->input->post('usua_doc'));
			$query = $this->db->get();

			foreach ($query->result() as $key) {
				$usua_id = $key->usua_id;
			}

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
							  'estu_idusua'      => $usua_id);

        	$this->db->where('estu_idusua', $this->usua_id);
        	$this->db->update('anav_estudiantes', $usuaStud);
            echo "<script type='text/javascript'>";
            echo "alert('Los datos se actualizaron con exito....!');";
            echo "</script>";
        }
	}

}

/* End of file estudianteMod.php */
/* Location: ./application/models/estudianteMod.php */