<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Mario Espinoza
 * Description: Sucursal model class
 */

class Sucursal_model extends CI_Model{


	function __construct(){
		parent::__construct();

		$this->load->database();
	}


	function getData() {
		$sucursales = $this->db->get('sucursal'); //obtenemos la tabla 
		//. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.

	 	return $sucursales->result(); //devolvemos el resultado de lanzar la query.
	}

	function obtenerSucursal($sucursal_id) {
		$this->db->select('id, companya_id, codigo, nombre');
		$this->db->from('sucursal');
		$this->db->where('id = ' . $sucursal_id);
		$sucursal = $this->db->get();
		
		return $sucursal->result();
	}

	function actualizar($data) {
		$this->db->set('codigo', $data['codigo']);
		$this->db->set('nombre', $data['nombre']);

		$this->db->where('id', $data['id']);
		$this->db->update('sucursal');
	}


	function insertar($data) {
		$this->db->set('companya_id', $data['companya_id']);
		$this->db->set('codigo', $data['codigo']);
		$this->db->set('nombre', $data['nombre']);
	 	$this->db->insert('sucursal');
	}

	function eliminar($sucursal_id) {
		$this->db->where('id', $sucursal_id);
		$this->db->delete('sucursal');
	}

}