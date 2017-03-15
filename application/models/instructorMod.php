<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class InstructorMod extends CI_Model {

	public function inst()
	{
		$id = $this->session->userdata('userId');
		$this->db->select('*');
		$this->db->from('anav_asignaciones');		
		$this->db->join('anav_grupos', 'grupo_id = asig_idgrupo', 'LEFT');			
		$this->db->join('anav_materias', 'mate_id = asig_idmate', 'LEFT');	
		$this->db->join('anav_instructores', 'inst_id = asig_idinst', 'LEFT');	
		$this->db->join('anav_usuarios', 'usua_id = inst_idusua', 'LEFT');		
		$this->db->join('anav_estados', 'esta_id = asig_idestado', 'LEFT');
		$this->db->join('anav_programas', 'prog_id = asig_idprog', 'LEFT');			
		$this->db->where('asig_idestado', 1);
		$this->db->where('inst_idusua', $id);		
		$this->db->order_by('grupo_nombre', 'asc');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function instUpd($usua_id)
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
        	$usuaInst = array('inst_id' 		 	 => $this->input->post('inst_id'),
								  'inst_codigo' 	 => $this->input->post('inst_codigo'),
								  'inst_nlicencia' 	 => $this->input->post('inst_nlicencia'),
								  'inst_telefono' 	 => $this->input->post('inst_telefono'),
								  'inst_direccion' 	 => $this->input->post('inst_direccion'),
								  'inst_genero' 	 => $this->input->post('inst_genero'),
								  'inst_fnacimiento' => $this->input->post('fnacimiento'),
								  'inst_rh'  		 => $this->input->post('inst_rh'),
								  'inst_idestado' 	 => $this->input->post('inst_idestado'),
								  'inst_idusua' 	 => $usua_id);

        	$this->db->where('inst_idusua', $this->usua_id);
        	$this->db->update('anav_instructores', $usuaInst);
	        
            echo "<script type='text/javascript'>";
            echo "alert('Los datos se actualizaron correctamente....!');";
            // echo "window.location.replace('".base_url()."admin');";
            echo "</script>";
        }
	}

	public function lstUser($usua_id)
	{
		$this->usua_id = $usua_id;
		$this->db->select('*');
		$this->db->from('anav_usuarios');		
		$this->db->join('anav_instructores', 'inst_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = inst_idestado', 'INNER');
		$this->db->where('usua_tipo', 'INST');		
		$this->db->where('usua_id', $this->usua_id);
		
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file instructorMod.php */
/* Location: ./application/models/instructorMod.php */