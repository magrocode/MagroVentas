<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesion extends CI_Controller {

	function __construct()
    {
    	parent::__construct();

    	$this->load->library('session');
    	    $this->load->helper('form');

    // cargamos la libreria de validacion de fornmulario
    	$this->load->library('form_validation');
    }

	public function signin()
	{
		
	}

	public function signout()
	{

	}
}
