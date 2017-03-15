<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class UserMod extends CI_Model {
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

	// Variables Admin
	var $admin_id;
	var $admin_telefono;
	var $admin_direccion;
	var $admin_genero;
	var $admin_fnacimiento;
	var $admin_rh;
	var $admin_idestado;
	var $admin_idusua;
	
	// Variables Instructor
	var $inst_id;
	var $inst_codigo;
	var $inst_nlicencia;
	var $inst_telefono;
	var $inst_direccion;
	var $inst_genero;
	var $inst_fnacimiento;
	var $inst_rh;
	var $inst_idestado;
	var $inst_idusua;

	// Variables Admin
	var $direc_id;
	var $direc_telefono;
	var $direc_direccion;
	var $direc_genero;
	var $direc_fnacimiento;
	var $direc_rh;
	var $direc_idestado;
	var $direc_idusua;

	/**
	 * Esta funcion permite insertar un nuevo registro de usuario dependiendo de su tipo
	 */
	public function userAdd()
	{
		$tipoUs = $this->input->post('usua_tipo');
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
            echo "alert('Problemas al Adicionar el Usuario!');";
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

        	if ($tipoUs == 'ADMIN') {
	        	$usuaAdmin = array('admin_id' 		   => $this->input->post('admin_id'),
								   'admin_telefono'    => $this->input->post('admin_telefono'),
								   'admin_direccion'   => $this->input->post('admin_direccion'),
								   'admin_genero'      => $this->input->post('admin_genero'),
								   'admin_fnacimiento' => $this->input->post('fnacimiento'),
								   'admin_rh'          => $rh,
								   'admin_idestado'	   => $this->input->post('admin_idestado'),
								   'admin_idusua'      => $usua_id);

	        	$this->db->insert('anav_administradores', $usuaAdmin);
	        }
	        elseif ($tipoUs == 'INST'){
	        	$usuaInst = array('inst_id' 		 => $this->input->post('inst_id'),
								  'inst_codigo' 	 => $this->input->post('inst_codigo'),
								  'inst_nlicencia' 	 => $this->input->post('inst_nlicencia'),
								  'inst_telefono' 	 => $this->input->post('inst_telefono'),
								  'inst_direccion' 	 => $this->input->post('inst_direccion'),
								  'inst_genero' 	 => $this->input->post('inst_genero'),
								  'inst_fnacimiento' => $this->input->post('fnacimiento'),
								  'inst_rh'  		 => $rh,
								  'inst_idestado' 	 => $this->input->post('inst_idestado'),
								  'inst_idusua' 	 => $usua_id);

	        	$this->db->insert('anav_instructores', $usuaInst);
	        }
	        elseif ($tipoUs == 'DIREC') {
	        	$usuaDirec = array('direc_id' 		   => $this->input->post('direc_id'),
								   'direc_telefono'    => $this->input->post('direc_telefono'),
								   'direc_direccion'   => $this->input->post('direc_direccion'),
								   'direc_genero'      => $this->input->post('direc_genero'),
								   'direc_fnacimiento' => $this->input->post('fnacimiento'),
								   'direc_rh'          => $rh,
								   'direc_idestado'	   => $this->input->post('direc_idestado'),
								   'direc_idusua'      => $usua_id);

	        	$this->db->insert('anav_directivos', $usuaDirec);
	        }
            echo "<script type='text/javascript'>";
            echo "alert('El usuario se adiciono con exito....!');";
            echo "</script>";
        }
	}

	public function lstUser($usua_id)
	{
		$this->usua_id = $usua_id;

		$query = $this->db->get_where('anav_usuarios', array('usua_id' => $this->usua_id));
		return $query->result();
	}

	public function lstAdmin($usua_id)
	{
		$this->usua_id = $usua_id;

		$query = $this->db->get_where('anav_administradores', array('admin_idusua' => $this->usua_id));
		return $query->result();
	}

	public function lstInst($usua_id)
	{
		$this->usua_id = $usua_id;

		$query = $this->db->get_where('anav_instructores', array('inst_idusua' => $this->usua_id));
		return $query->result();
	}

	public function lstDirec($usua_id)
	{
		$this->usua_id = $usua_id;

		$query = $this->db->get_where('anav_directivos', array('direc_idusua' => $this->usua_id));
		return $query->result();
	}

	public function userUpd($usua_id)
	{
		$this->usua_id = $usua_id;
		$tipoUs = $this->input->post('usua_tipo');
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
            echo "alert('Problemas al Adicionar el Usuario!');";
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


        	if ($tipoUs == 'ADMIN') {

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
	        }
	        elseif ($tipoUs == 'INST'){
	        	$usuaInst = array('inst_id' 		 => $this->input->post('inst_id'),
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
	        }
	        elseif ($tipoUs == 'DIREC') {
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
	        }
            echo "<script type='text/javascript'>";
            echo "alert('El usuario se actualizo con exito....!');";
            echo "</script>";
        }
	}

	
	public function inact_user($usua_id, $user)
	{
		if ($user == 'admin') {
			$this->admin_idestado = 2;
			$this->admin_idusua = $usua_id;
			$this->db->where('admin_idusua', $this->admin_idusua);
			if (!$this->db->update('anav_administradores', array('admin_idestado' => $this->admin_idestado))) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al cambiar el estado');";
	            echo "</script>";
			}
			else{
				echo "<script type='text/javascript'>";
	            echo "alert('El estado del usuarios es: Inactivo');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
		elseif ($user == 'inst') {
			$this->inst_idestado = 2;
			$this->inst_idusua = $usua_id;
			$this->db->where('inst_idusua', $this->inst_idusua);
			if (!$this->db->update('anav_instructores', array('inst_idestado' => $this->inst_idestado))) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al cambiar el estado');";
	            echo "</script>";
			}
			else{
				echo "<script type='text/javascript'>";
	            echo "alert('El estado del usuarios es: Inactivo');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
		elseif ($user == 'direc') {
			$this->direc_idestado = 2;
			$this->direc_idusua = $usua_id;
			$this->db->where('direc_idusua', $this->direc_idusua);
			if (!$this->db->update('anav_directivos', array('direc_idestado' => $this->direc_idestado))) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al cambiar el estado');";
	            echo "</script>";
			}
			else{
				echo "<script type='text/javascript'>";
	            echo "alert('El estado del usuarios es: Inactivo');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
	}

	public function act_user($usua_id, $user)
	{
		if ($user == 'admin') {
			$this->admin_idestado = 1;
			$this->admin_idusua = $usua_id;
			$this->db->where('admin_idusua', $this->admin_idusua);
			if (!$this->db->update('anav_administradores', array('admin_idestado' => $this->admin_idestado))) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al cambiar el estado');";
	            echo "</script>";
			}
			else{
				echo "<script type='text/javascript'>";
	            echo "alert('El estado del usuarios es: Activo');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
		elseif ($user == 'inst') {
			$this->inst_idestado = 1;
			$this->inst_idusua = $usua_id;
			$this->db->where('inst_idusua', $this->inst_idusua);
			if (!$this->db->update('anav_instructores', array('inst_idestado' => $this->inst_idestado))) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al cambiar el estado');";
	            echo "</script>";
			}
			else{
				echo "<script type='text/javascript'>";
	            echo "alert('El estado del usuarios es: Activo');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
		elseif ($user == 'direc') {
			$this->direc_idestado = 1;
			$this->direc_idusua = $usua_id;
			$this->db->where('direc_idusua', $this->direc_idusua);
			if (!$this->db->update('anav_directivos', array('direc_idestado' => $this->direc_idestado))) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al cambiar el estado');";
	            echo "</script>";
			}
			else{
				echo "<script type='text/javascript'>";
	            echo "alert('El estado del usuarios es: Activo');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
	}

	public function dltUser($usua_id, $user)
	{
		if ($user == 'admin') {
			$this->admin_idusua = $usua_id;
			$this->db->where('admin_idusua', $this->admin_idusua);
			if (!$this->db->delete('anav_administradores')) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al eliminar el usuario: Administrador');";
	            echo "</script>";
			}
			else{
				$this->db->where('usua_id', $this->admin_idusua);
				$this->db->delete('anav_usuarios');
				echo "<script type='text/javascript'>";
	            echo "alert('El usuario: Administrador fue eliminado con exito');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
		elseif ($user == 'inst') {
			$this->inst_idusua = $usua_id;
			$this->db->where('inst_idusua', $this->inst_idusua);
			if (!$this->db->delete('anav_instructores')) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al eliminar el usuario: Instructor');";
	            echo "</script>";
			}
			else{
				$this->db->where('usua_id', $this->inst_idusua);
				$this->db->delete('anav_usuarios');
				echo "<script type='text/javascript'>";
	            echo "alert('El usuario: Instructor fue eliminado con exito');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
		elseif ($user == 'direc') {
			$this->direc_idusua = $usua_id;
			$this->db->where('direc_idusua', $this->direc_idusua);
			if (!$this->db->delete('anav_directivos')) {
				echo "<script type='text/javascript'>";
	            echo "alert('Problemas al eliminar el usuario: Directivo');";
	            echo "</script>";
			}
			else{
				$this->db->where('usua_id', $this->direc_idusua);
				$this->db->delete('anav_usuarios');
				echo "<script type='text/javascript'>";
	            echo "alert('El usuario: Directivo fue eliminado con exito');";
	            echo "window.location.replace('".base_url()."admin');";
	            echo "</script>";
			}
		}
	}
}

/* End of file userMod.php */
/* Location: ./application/models/userMod.php */