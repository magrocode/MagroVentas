<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->check_isvalidated();	
	}

	function index() {
		$this->load->model('usuario_model'); //cargamos el modelo

 		$data['page_title'] = "Usuarios";

 		//Obtener datos de la tabla 'contacto'
 		$usuarios = $this->usuario_model->getData(); //llamamos a la función getData() del modelo creado anteriormente.

		$data['usuarios'] = $usuarios;

 		//load de vistas
		$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
 		$this->load->view('usuarios/index', $data); 
 		$this->load->view('templates/footer'); 
 	}


	/*
	* VALIDACION DE PERMISOS
	*/

	private function check_isvalidated(){
		// valida el estado de la sesion
		if(! $this->session->userdata('validated')){
			redirect('sesion');
		}
	}
}