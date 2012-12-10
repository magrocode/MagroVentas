<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller {

	function __construct()
    {
    	parent::__construct();

    	//$this->load->helper('url');
        //$this->load->helper('html');
            $this->load->helper('form');

    // cargamos la libreria de validacion de fornmulario
    $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/nosignin_menu');
		$this->load->view('sesiones/new');
		
	}

}