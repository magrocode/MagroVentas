<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library('grocery_CRUD');	
	}

	function index()
	{
		$this->listado();
	}

	public function listado()
    {
    	$this->grocery_crud->set_theme('datatables');
        $this->grocery_crud->set_table('proveedor');
        $this->grocery_crud->set_relation('companya_id','companya','nombre');
        $this->grocery_crud->columns('rut','nombre');
        $this->grocery_crud->display_as('RUT','Nombre');
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