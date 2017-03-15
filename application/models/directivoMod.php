<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DirectivoMod extends CI_Model {

	public function admin()
	{
		$this->db->select('*');
		$this->db->from('anav_usuarios');		
		$this->db->join('anav_administradores', 'admin_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = admin_idestado', 'INNER');
		$this->db->where('usua_tipo', 'ADMIN');		
		$this->db->where_not_in('usua_doc', $this->session->userdata('userDoc'));
		$this->db->where_not_in('usua_doc', 123456);
		$this->db->order_by('usua_pnombre', 'asc');
		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function inst()
	{
		$this->db->select('*');
		$this->db->from('anav_usuarios');		
		$this->db->join('anav_instructores', 'inst_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = inst_idestado', 'INNER');
		$this->db->where('usua_tipo', 'INST');			
		$this->db->order_by('usua_pnombre', 'asc');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function califiGroup($grupo)
	{
		$this->db->select('*');
		$this->db->from('anav_grupos');		
		$this->db->join('anav_programas', 'prog_id = grupo_idprog', 'INNER');			
		$this->db->join('anav_estugrupos', 'estugrupos_idgrupo = grupo_id', 'INNER');		
		$this->db->join('anav_estudiantes', 'estu_id = estugrupos_idestu', 'INNER');		
		$this->db->join('anav_usuarios', 'usua_id = estu_idusua', 'INNER');			
		$this->db->where('grupo_codigo', $grupo);	
		$this->db->where('grupo_idestado', 1);		
		
		$query = $this->db->get();
		return $query->result();
	}

	public function lstGrupo($grupo)
	{
		$query = $this->db->get_where('anav_grupos', array('grupo_codigo' => $grupo));
		return $query->result();
	}

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

	public function direcUpd($usua_id)
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
        	$usuaDirec = array('direc_id' 		   => $this->input->post('direc_id'),
							   'direc_telefono'    => $this->input->post('direc_telefono'),
							   'direc_direccion'   => $this->input->post('direc_direccion'),
							   'direc_genero'      => $this->input->post('direc_genero'),
							   'direc_fnacimiento' => $this->input->post('fnacimiento'),
							   'direc_rh'          => $this->input->post('direc_rh'),
							   'direc_idestado'	   => $this->input->post('direc_idestado'),
							   'direc_idusua'      => $usua_id);

        	$this->db->where('direc_idusua', $this->usua_id);
        	$this->db->update('anav_directivos', $usuaDirec);
	        
            echo "<script type='text/javascript'>";
            echo "alert('Los datos se actualizaron correctamente....!');";
            // echo "window.location.replace('".base_url()."admin');";
            echo "</script>";
        }
	}

	public function lstUser($usua_id) { $this->usua_id = $usua_id;
	$this->db->select('*'); $this->db->from('anav_usuarios');
	$this->db->join('anav_directivos', 'direc_idusua = usua_id','INNER'); 
	$this->db->join('anav_estados', 'esta_id = direc_idestado', 'INNER'); 
	$this->db->where('usua_tipo', 'DIREC');
	$this->db->where('usua_id', $this->usua_id);
		
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file directivoMod.php */
/* Location: ./application/models/directivoMod.php */