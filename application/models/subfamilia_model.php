<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Mario Espinoza
 * Description: Proveedor model class
 */

class Subfamilia_model extends CI_Model{


	function __construct(){
		parent::__construct();
	}


	function getData() {
		$subfamilias = $this->db->get('subfamilia_producto'); //obtenemos la tabla 
		//. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.

	 	return $subfamilias->result(); //devolvemos el resultado de lanzar la query.
	}

	function obtener($subfamilia_id) {
		$this->db->select('id, companya_id, codigo, nombre');
		$this->db->from('subfamilia_producto');
		$this->db->where('id = ' . $subfamilia_id);
		$subfamilia = $this->db->get();
		
		return $subfamilia->result();
	}

	function actualizar($data) {
		$this->db->set('codigo', $data['codigo']);
		$this->db->set('nombre', $data['nombre']);

		$this->db->where('id', $data['id']);
		$this->db->update('subfamilia_producto');
	}


	function insertar($data) {
		$this->db->set('companya_id', $data['companya_id']);
		$this->db->set('codigo', $data['codigo']);
		$this->db->set('nombre', $data['nombre']);
	 	$this->db->insert('subfamilia_producto');
	}

	function eliminar($subfamilia_id) {
		$this->db->where('id', $subfamilia_id);
		$this->db->delete('subfamilia_producto');
	}

}