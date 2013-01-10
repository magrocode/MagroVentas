<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Mario Espinoza
 * Description: Usuario model class
 */

class Usuario_model extends CI_Model{


	function __construct(){
		parent::__construct();
	}

	function getData() {
		$usuarios = $this->db->get('usuario'); //obtenemos la tabla 
		//. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.

	 	return $usuarios->result(); //devolvemos el resultado de lanzar la query.
	}

	function obtener($usuario_id) {
		$this->db->select('id, companya_id, email, nombre, apellidos, password');
		$this->db->from('usuario');
		$this->db->where('id = ' . $usuario_id);
		$usuario = $this->db->get();
		
		return $usuario->result();
	}

	function actualizar($data) {
		$this->db->set('email', $data['email']);
		$this->db->set('nombre', $data['nombre']);
		$this->db->set('apellidos', $data['apellidos']);
		$this->db->set('password', $data['password']);

		$this->db->where('id', $data['id']);
		$this->db->update('usuario');
	}

	function insertar($data) {
		$this->db->set('companya_id', $data['companya_id']);
		$this->db->set('email', $data['email']);
		$this->db->set('nombre', $data['nombre']);
		$this->db->set('apellidos', $data['apellidos']);
		$this->db->set('password', $data['password']);
	 	$this->db->insert('usuario');
	}

	function eliminar($usuario_id) {
		$this->db->where('id', $usuario_id);
		$this->db->delete('usuario');
	}

	function buscar_email($email) {
		$this->db->select('id');
		$this->db->from('usuario');
		$this->db->where('email', $email);
		$usuario = $this->db->get();
		
		if ($usuario->num_rows() > 0)
			return true;
		elseif ($usuario->num_rows() == 0)
			return false;
	}

}