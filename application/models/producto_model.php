<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Mario Espinoza
 * Description: Proveedor model class
 */

class Producto_model extends CI_Model{


	function __construct(){
		parent::__construct();
	}


	function getData() {
		$productos = $this->db->get('producto'); //obtenemos la tabla 
		//. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.

	 	return $productos->result(); //devolvemos el resultado de lanzar la query.
	}

	function obtener($producto_id) {
		$this->db->select('id, companya_id, sku, nombre');
		$this->db->from('producto');
		$this->db->where('id = ' . $producto_id);
		$subfamilia = $this->db->get();
		
		return $subfamilia->result();
	}

	function actualizar($data) {
		$this->db->set('sku', $data['sku']);
		$this->db->set('nombre', $data['nombre']);

		$this->db->where('id', $data['id']);
		$this->db->update('producto');
	}


	function insertar($data) {
		$this->db->set('companya_id', $data['companya_id']);
		$this->db->set('sku', $data['sku']);
		$this->db->set('nombre', $data['nombre']);
	 	$this->db->insert('producto');
	}

	function eliminar($producto_id) {
		$this->db->where('id', $producto_id);
		$this->db->delete('producto');
	}

}