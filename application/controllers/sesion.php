<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesion extends CI_Controller {

	function __construct()
    {
    	parent::__construct();

    	$this->load->library('session');
    }

	public function signin()
	{
		
	}

	public function signout()
	{

	}
}
