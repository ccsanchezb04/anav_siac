<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginMod extends CI_model 
{
	var $doc 	  = "";
	var $password = "";
	var $tipo 	  = "";

	public function validacion()
	{
		$this->doc 		= $this->input->post('docuemnto');
		$this->password = md5($this->input->post('contrasena'));
		
		$this->db->select('usua_doc, usua_pnombre, usua_papellido, usua_password, usua_id, usua_tipo, 
						   admin_idestado, inst_idestado, estu_idestado, direc_idestado,
						   esta_admin.esta_nombre as esta_admin, esta_inst.esta_nombre as esta_inst, 
						   esta_estu.esta_nombre as esta_estu, esta_direc.esta_nombre as esta_direc');
		$this->db->from('anav_usuarios');	
		$this->db->join('anav_administradores', 'admin_idusua = usua_id', 'left');	
		$this->db->join('anav_instructores', 'inst_idusua = usua_id', 'left');	
		$this->db->join('anav_estudiantes', 'estu_idusua = usua_id', 'left');	
		$this->db->join('anav_directivos', 'direc_idusua = usua_id', 'left');
		$this->db->join('anav_estados as esta_admin', 'esta_admin.esta_id = admin_idestado', 'left');	
		$this->db->join('anav_estados as esta_inst', 'esta_inst.esta_id = inst_idestado', 'left');	
		$this->db->join('anav_estados as esta_estu', 'esta_estu.esta_id = estu_idestado', 'left');	
		$this->db->join('anav_estados as esta_direc', 'esta_direc.esta_id = direc_idestado', 'left');	
		$this->db->where('usua_doc', $this->doc);
		$this->db->where('usua_password', $this->password);
		$this->db->limit(1);
		
		$query = $this->db->get();
			
		
		foreach ($query->result() as $key) 
		{
			$this->session->set_userdata(array('userRole'=> $key->usua_tipo,
											   'userId'  => $key->usua_id,
											   'userDoc' => $key->usua_doc,
											   'userName'=> $key->usua_pnombre." ".$key->usua_papellido,
											   'adminEst'=> $key->admin_idestado,
											   'intsEst' => $key->inst_idestado,
											   'estuEst' => $key->estu_idestado,
											   'direcEst'=> $key->direc_idestado));
		}
		if ($query->num_rows() > 0) 
		{
			redirect(base_url().'login', 'refresh');
		}
		else
		{
			echo "<script>";
			echo "alert('¡No. de identificación/Contraseña Incorrectos!');";
			echo "</script>";
		}		
	}
}