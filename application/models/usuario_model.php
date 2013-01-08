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
}