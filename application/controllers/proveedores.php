<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');	
	}

	function index()
	{
		$this->listado();
	}

	public function listado()
    {
        $this->grocery_crud->set_table('proveedor');
        $output = $this->grocery_crud->render();

        $this->_proveedores_output($output);          
    }

    function _proveedores_output($output = null)
    {
    	$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
        $this->load->view('/proveedores/index.php',$output);  
    }	
}