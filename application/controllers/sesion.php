<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Mario Espinoza
 * Description: Sesion controller class
 */

class Sesion extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    	
    }

    public function index($msg = NULL){
		// Carga la vista de login
		$data['msg'] = $msg;
		$this->load->view('templates/header');
		$this->load->view('templates/nosignin_menu');
		$this->load->view('sesiones/new', $data);
	}

	public function process(){
		// Carga el modelo
		$this->load->model('sesion_model');
		// Valida que el usuario pueda logearse
		$result = $this->sesion_model->validate();
		// Ahora verificamos el resultado
		if(! $result){
			// Si el usuario no valida, entonces muestra la pagina de login otra vez
			$msg = '<font color=red>Email y/o Password invalido</font><br />';
			$this->index($msg);
		}else{
			// Si el usuario se valida
			// Lo envia al menu principal
			redirect('application');
		}		
	}

 	public function signout(){
        $this->session->sess_destroy();
        redirect('sesion');
    }
/*
	public function signin()
	{
		
	}

	public function signout()
	{

	} */
}
