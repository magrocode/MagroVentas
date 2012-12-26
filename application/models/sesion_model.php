<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Mario Espinoza
 * Description: Sesion model class
 */

class Sesion_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function validate(){
		// se traga los datos de los inputs de login
		$email = $this->security->xss_clean($this->input->post('email'));
		$password = $this->security->xss_clean($this->input->post('password'));

		$password_encriptado =  do_hash(do_hash($password), 'md5');
		
		// Prepara la query
		$this->db->where('email', $email);
		$this->db->where('password', $password_encriptado);
		
		// Lanza la query
		$query = $this->db->get('usuario');
		
		// Chequeamos si hay algun resultado
		if($query->num_rows == 1)
		{
			// Si hay un usuario, entonces creamos datos de sesion
			$row = $query->row();
			$data = array(
					'userid' => $row->userid,
					'fname' => $row->fname,
					'lname' => $row->lname,
					'email' => $row->email,
					'nombre' => $row->nombre,
					'validated' => true
					);
			echo $row->nombre;
			$this->session->set_userdata($data);
			return true;
		}
		// Si el proceso anterior no valida
		// entonces retorna falso
		return false;
	}
}