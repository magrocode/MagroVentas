<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    	$this->check_isvalidated();
    }

	public function index()
	{
		// si esta correctamente logeado
		$this->load->view('templates/header');
        $this->load->view('templates/main_menu');
		//$this->load->view('sesiones/new');		
	}

	private function check_isvalidated(){
		// valida el estado de la sesion
		if(! $this->session->userdata('validated')){
			redirect('sesion');
		}
	}

}