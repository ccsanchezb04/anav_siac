<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class AdminMod extends CI_Model {

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

	public function direc()
	{
		$this->db->select('*');
		$this->db->from('anav_usuarios');		
		$this->db->join('anav_directivos', 'direc_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = direc_idestado', 'INNER');
		$this->db->where('usua_tipo', 'DIREC');		
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

	public function programas()
	{
		$query = $this->db->get('anav_programas');
		return $query->result();
	}

	public function studentReg($prog)
	{
		$this->db->select('*');
		$this->db->from('anav_usuarios');		
		$this->db->join('anav_estudiantes', 'estu_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = estu_idestado', 'INNER');	
		$this->db->join('anav_estaacad', 'estaacad_id = estu_idestaacad', 'INNER');	
		$this->db->join('anav_programas', 'prog_id = estu_idprog', 'INNER');	
		$this->db->where('prog_codigo', $prog);		
		$this->db->where('usua_tipo', 'EST');		
		$this->db->where('estu_idestado', 1);		
		$this->db->where('estu_idestaacad', 1);				
		$this->db->order_by('usua_papellido', 'asc');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function studentEnr($grupo)
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

	public function grupos($prog)
	{
		$this->db->select('*');
		$this->db->from('anav_grupos');		
		$this->db->join('anav_programas', 'prog_id = grupo_idprog', 'INNER');			
		$this->db->where('prog_codigo', $prog);
		$this->db->where('grupo_idestado', 1);		
		
		$query = $this->db->get();
		return $query->result();
	}

	public function materias($prog)
	{
		$this->db->select('*');
		$this->db->from('anav_materias');		
		$this->db->join('anav_programas', 'prog_id = mate_idprog', 'INNER');			
		$this->db->where('prog_codigo', $prog);
		$this->db->where('mate_idestado', 1);		
		
		$query = $this->db->get();
		return $query->result();
	}

	public function asig($prog)
	{
		$this->db->select('*');
		$this->db->from('anav_asignaciones');		
		$this->db->join('anav_grupos', 'grupo_id = asig_idgrupo', 'INNER');			
		$this->db->join('anav_materias', 'mate_id = asig_idmate', 'INNER');	
		$this->db->join('anav_instructores', 'inst_id = asig_idinst', 'INNER');	
		$this->db->join('anav_usuarios', 'usua_id = inst_idusua', 'INNER');		
		$this->db->join('anav_estados', 'esta_id = asig_idestado', 'INNER');
		$this->db->join('anav_programas', 'prog_id = asig_idprog', 'INNER');		
		$this->db->where('prog_codigo', $prog);		
		$this->db->where('asig_idestado', 1);		
		$this->db->order_by('grupo_nombre', 'asc');
		
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

	public function lstProg($prog)
	{
		$query = $this->db->get_where('anav_programas', array('prog_codigo' => $prog));
		return $query->result();
	}

	public function buscarUsuario($dato)
	{
		$queryCons = "SELECT usua_id, usua_doc, usua_pnombre, usua_papellido, usua_tipo, admin_idestado, inst_idestado, 
							 esta_admin.esta_nombre as esta_admin, esta_direc.esta_nombre as esta_direc, esta_inst.esta_nombre as esta_inst
					  FROM anav_usuarios
					  LEFT JOIN anav_administradores ON admin_idusua = usua_id
					  LEFT JOIN anav_instructores ON inst_idusua = usua_id
					  LEFT JOIN anav_directivos ON direc_idusua = usua_id
					  LEFT JOIN anav_estados AS esta_admin ON esta_admin.esta_id = admin_idestado
					  LEFT JOIN anav_estados AS esta_inst ON esta_inst.esta_id = inst_idestado
					  LEFT JOIN anav_estados AS esta_direc ON esta_direc.esta_id = direc_idestado
					  WHERE (usua_doc LIKE '%".$dato."%' 
					  OR usua_pnombre LIKE '%".$dato."%' 
					  OR usua_papellido LIKE '%".$dato."%') 
					  AND usua_doc NOT IN(".$this->session->userdata('userDoc').")
					  AND usua_doc NOT IN(123456)
					  AND usua_tipo NOT IN('EST');";
		$query = $this->db->query($queryCons);
		return $query->result();
	}

	public function buscarEstudiante($dato)
	{
		$queryCons = "SELECT usua_id, usua_doc, usua_pnombre, usua_papellido, estu_id, usua_tipo, estu_idestaacad, 
							 estaacad_nombre, estu_idestado, esta_nombre, estu_idprog, prog_codigo, grupo_codigo
					  FROM anav_usuarios
					  LEFT JOIN anav_estudiantes ON estu_idusua = usua_id 
					  LEFT JOIN anav_estaacad ON estaacad_id = estu_idestaacad 
					  LEFT JOIN anav_estados ON esta_id = estu_idestado 
					  LEFT JOIN anav_programas ON prog_id = estu_idprog 
					  LEFT JOIN anav_estugrupos ON estugrupos_idestu = estu_id
					  LEFT JOIN anav_grupos ON grupo_id = estugrupos_idgrupo
					  WHERE usua_tipo = 'EST' 
					  AND (usua_doc LIKE '%".$dato."%' 
					  OR usua_pnombre LIKE '%".$dato."%' 
					  OR usua_papellido LIKE '%".$dato."%') 
					  AND usua_doc NOT IN(".$this->session->userdata('userId').")
					  AND usua_tipo NOT IN('ADMIN','INST');";
		
		$query = $this->db->query($queryCons);
		return $query->result();
	}

	public function existenciaUsuario($dato)
	{
		$queryExist = "SELECT COUNT(*) AS total FROM anav_usuarios WHERE usua_doc = ".$dato.";";
		
		$query = $this->db->query($queryExist);
		return $query->result();
	}

	public function adminUpd($usua_id)
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
        	$usuaAdmin = array('admin_id' 		   => $this->input->post('admin_id'),
							   'admin_telefono'    => $this->input->post('admin_telefono'),
							   'admin_direccion'   => $this->input->post('admin_direccion'),
							   'admin_genero'      => $this->input->post('admin_genero'),
							   'admin_fnacimiento' => $this->input->post('fnacimiento'),
							   'admin_rh'          => $this->input->post('admin_rh'),
							   'admin_idestado'	   => $this->input->post('admin_idestado'),
							   'admin_idusua'      => $usua_id);

        	$this->db->where('admin_idusua', $this->usua_id);
        	$this->db->update('anav_administradores', $usuaAdmin);
	        
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
		$this->db->join('anav_administradores', 'admin_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = admin_idestado', 'INNER');
		$this->db->where('usua_tipo', 'ADMIN');		
		$this->db->where('usua_id', $this->usua_id);
		
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file adminMod.php */
/* Location: ./application/models/adminMod.php */