<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Mario Espinoza
 * Description: Sucursal model class
 */

class Companya_model extends CI_Model{


	function __construct(){
		parent::__construct();
	}

	function obtenerCompanya($companya_id) {
		$this->db->select('id, rut, nombre, direccion');
		$this->db->from('companya');
		$this->db->where('id = ' . $companya_id);
		$companya = $this->db->get();
		
		return $companya->result();
	}	

	function actualizar($data) {
		$this->db->set('rut', $data['rut']);
		$this->db->set('nombre', $data['nombre']);
		$this->db->set('direccion', $data['direccion']);

		$this->db->where('id', $data['id']);
		$this->db->update('companya');
	}
}