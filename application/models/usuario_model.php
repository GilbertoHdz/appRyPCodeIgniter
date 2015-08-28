<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('usuarios');

		if ($query->num_rows()>0) {
			return $query;
		} else {
			return false;
		}
	}

	//obtener usuarios
	public function get_users()
	{
		$query = $this->db->get('usuarios');
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
 
	//eliminar usuarios
	public function delete_user($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('usuarios');
	}
 
	//editar usuarios
	public function edit_user($id, $obj)
	{
 
		$data = array(
			'nombre'	=>		element('Nomb', $obj),
			'apellidos'	=>		element('Ape', $obj),
			'password'	=>		element('Con', $obj),
			'username'	=>		element('Usu', $obj),
			'tipo'		=>		element('Tip', $obj)
		);
 
		$this->db->where('id', $id);
		$this->db->update('usuarios',$data);
 
	}
 
	//añadir usuarios
	public function new_user($obj)
	{
		//$fecha = date('Y-m-d'); //por si llegase a necesitar fecha
		//(id_usuarios, nombre, apellidos, email, password, username, tipo)

		$data = array(
			'nombre'	=>		element('Nomb', $obj),
			'apellidos'	=>		element('Ape', $obj),
			'password'	=>		element('Con', $obj),
			'username'	=>		element('Usu', $obj),
			'tipo'		=>		element('Tip', $obj)
		);

		$this->db->insert('usuarios',$data);
	}



}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */