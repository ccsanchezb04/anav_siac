<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class StudentMod extends CI_Model {

	// Variables para usuario
	var $usua_id;
	var $usua_doc;
	var $usua_pnombre;
	var $usua_papellido;
	var $usua_snombre;
	var $usua_sapellido;
	var $usua_email;
	var $usua_password;
	var $usua_tipo;

	// Variables para estudnate
	var $estu_codigo;
	var $estu_fingreso;
	var $estu_idprog;
	var $estu_telefono;
	var $estu_direccion;
	var $estu_genero;
	var $estu_fnacimiento;
	var $estu_id;
	var $estu_idusua;
	var $estu_idestado;
	var $estu_idestaacad;

	public function programas()
	{
		$query = $this->db->get('anav_programas');
		return $query->result();
	}

	public function estaacad()
	{
		$query = $this->db->get('anav_estaacad');
		return $query->result();
	}

	public function grupo($prog)
	{
		$query = $this->db->get_where('anav_grupos', array('grupo_idprog' => $prog));
		return $query->result();
	}

	public function lstProg($grupo)
	{
		$query = $this->db->get_where('anav_programas', array('prog_codigo' => $grupo));
		return $query->result();
	}

	public function student($usua_id)
	{
		$this->estu_idusua = $usua_id;
		$this->db->select('*');
		$this->db->from('anav_usuarios');		
		$this->db->join('anav_estudiantes', 'estu_idusua = usua_id', 'INNER');			
		$this->db->join('anav_estados', 'esta_id = estu_idestado', 'INNER');	
		$this->db->join('anav_estaacad', 'estaacad_id = estu_idestaacad', 'INNER');	
		$this->db->join('anav_programas', 'prog_id = estu_idprog', 'INNER');	
		$this->db->where('usua_tipo', 'EST');		
		$this->db->where('estu_idusua', $this->estu_idusua);		
		$this->db->where('estu_idestado', 1);						
		$this->db->order_by('usua_papellido', 'asc');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function studAdd()
	{
		$rh = $this->input->post('grupo-san').''.$this->input->post('rh');

		$usuario = array('usua_id' 		  => $this->input->post('usua_id'),
						 'usua_doc' 	  => $this->input->post('usua_doc'),
						 'usua_pnombre'   => $this->input->post('usua_pnombre'),
						 'usua_papellido' => $this->input->post('usua_papellido'),
						 'usua_snombre'   => $this->input->post('usua_snombre'),
						 'usua_sapellido' => $this->input->post('usua_sapellido'),
						 'usua_email'	  => $this->input->post('usua_email'),
						 'usua_password'  => md5($this->input->post('usua_password')),
						 'usua_tipo' 	  => $this->input->post('usua_tipo'));
       
		
        if (!$this->db->insert('anav_usuarios', $usuario)) 
        {        	
            //echo mysql_error($query);
            echo "<script type='text/javascript'>";
            echo "alert('Problemas al adicionar el estudiante!');";
            echo "</script>";
        }
        else
        {
        	$this->db->select('usua_id');
			$this->db->from('anav_usuarios');		
			$this->db->where('usua_doc', $this->input->post('usua_doc'));
			$query = $this->db->get();

			foreach ($query->result() as $key) 
			{
				$usua_id = $key->usua_id;
			}

        	$usuaStud = array('estu_id' 		 => $this->input->post('estu_id'),
							  'estu_codigo'      => $this->input->post('estu_codigo'),
							  'estu_fingreso'    => $this->input->post('fingreso'),
							  'estu_telefono'    => $this->input->post('estu_tel'),
							  'estu_direccion'   => $this->input->post('estu_direccion'),
							  'estu_genero'      => $this->input->post('estu_genero'),
							  'estu_fnacimiento' => $this->input->post('fnacimiento'),
							  'estu_rh'          => $rh,
							  'estu_idestado'	 => $this->input->post('estu_idestado'),
							  'estu_idprog'		 => $this->input->post('estu_idprog'),
							  'estu_idestaacad'	 => $this->input->post('estu_idestaacad'),
							  'estu_idusua'      => $usua_id);

        	$this->db->insert('anav_estudiantes', $usuaStud);

            echo "<script type='text/javascript'>";
            echo "alert('El estudiante se adiciono con exito....!');";
            echo "</script>";
        }
	}

	public function lstUser($usua_id)
	{
		$this->usua_id = $usua_id;

		$query = $this->db->get_where('anav_usuarios', array('usua_id' => $this->usua_id));
		return $query->result();
	}

	public function lstStud($usua_id)
	{
		$this->usua_id = $usua_id;

		$query = $this->db->get_where('anav_estudiantes', array('estu_idusua' => $this->usua_id));
		return $query->result();
	}

	public function updStud($usua_id)
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
            echo "alert('El estudiante se actualizo con exito....!');";
            echo "</script>";
        }
	}

	public function lista_estudiantes($grupo)
	{
		$this->db->select('*');
		$this->db->from('anav_estugrupos');					
		$this->db->join('anav_grupos', 'grupo_id = estugrupos_idgrupo', 'LEFT');		
		$this->db->join('anav_estudiantes', 'estu_id = estugrupos_idestu', 'LEFT');		
		$this->db->join('anav_usuarios', 'usua_id = estu_idusua', 'LEFT');			
		$this->db->where('grupo_codigo', $grupo);	
		$this->db->where('grupo_idestado', 1);
		$this->db->order_by('usua_papellido', 'asc');	
		
		$query = $this->db->get();
		return $query->result();
	}

	public function dltStud($usua_id,$grupo)
	{
		$this->estu_idusua = $usua_id;
		$this->db->where('estu_idusua', $this->estu_idusua);
		if (!$this->db->delete('anav_estudiantes')) {
			echo "<script type='text/javascript'>";
	        echo "alert('Problemas al eliminar el(la) estudiante');";
	        echo "</script>";
		}
		else{
			$this->db->where('usua_id', $this->estu_idusua);
			$this->db->delete('anav_usuarios');
			echo "<script type='text/javascript'>";
	        echo "alert('El(La) estudiante fue eliminado con exito');";
	        echo "window.location.replace('".base_url()."admin/estudiantes_inscritos/".$grupo."');";
	        echo "</script>";
		}
	}
}

/* End of file studentMod.php */
/* Location: ./application/models/studentMod.php */