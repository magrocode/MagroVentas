<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Mario Espinoza
 * Description: Proveedor model class
 */

class Proveedor_model extends CI_Model{


	function __construct(){
		parent::__construct();
	}


	function getData() {
		$proveedores = $this->db->get('proveedor'); //obtenemos la tabla 
		//. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.

	 	return $proveedores->result(); //devolvemos el resultado de lanzar la query.
	}

	function obtener($proveedor_id) {
		$this->db->select('id, companya_id, rut, nombre');
		$this->db->from('proveedor');
		$this->db->where('id = ' . $proveedor_id);
		$proveedor = $this->db->get();
		
		return $proveedor->result();
	}

	function actualizar($data) {
		$this->db->set('rut', $data['rut']);
		$this->db->set('nombre', $data['nombre']);

		$this->db->where('id', $data['id']);
		$this->db->update('proveedor');
	}


	function insertar($data) {
		$this->db->set('companya_id', $data['companya_id']);
		$this->db->set('rut', $data['rut']);
		$this->db->set('nombre', $data['nombre']);
	 	$this->db->insert('proveedor');
	}

	function eliminar($proveedor_id) {
		$this->db->where('id', $proveedor_id);
		$this->db->delete('proveedor');
	}

}