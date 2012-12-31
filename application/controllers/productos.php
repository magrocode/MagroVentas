<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

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
        //estableciendo el id de companya
        //$companya_id = $this->session->userdata('companya_id');

    	//$this->grocery_crud->set_theme('datatables');
        $this->grocery_crud->set_table('producto');
        $this->grocery_crud->set_subject('Producto');
        
        //consulta relacionada a companya
        //$this->grocery_crud->set_relation('companya_id','companya','nombre');
        
        //campos disponibles
        $this->grocery_crud->fields('companya_id', 
                                    'sku',
                                    'modelo', 
                                    'codigo_compra', 
                                    'nombre', 
                                    'descripcion', 
                                    'unidad', 
                                    'stock_minimo', 
                                    'precio_compra',
                                    'precio_sugerido_venta');

        //campos ocultos
        $this->grocery_crud->field_type('companya_id', 'hidden');
        
        $this->grocery_crud->columns('sku','modelo', 'nombre');
        $this->grocery_crud->display_as('sku','Sku');
        $this->grocery_crud->display_as('modelo','Modelo');
        $this->grocery_crud->display_as('codigo_compra','Codigo de Compra');
        $this->grocery_crud->display_as('nombre','Nombre');

        //antes de incertar o actualizar
        $this->grocery_crud->callback_before_insert(array($this, 'checking_companya_id'));
        $this->grocery_crud->callback_before_update(array($this, 'checking_companya_id'));

        $output = $this->grocery_crud->render();

        $this->_productos_output($output);          
    }

    function _productos_output($output = null)
    {
    	$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
        $this->load->view('/productos/index',$output);          
        $this->load->view('templates/footer');    
    }	

    function checking_companya_id($post_array) 
    {
        $companya_id = $this->session->userdata('companya_id');
        if(empty($post_array['companya_id']))
        {
            $post_array['companya_id'] = $companya_id;
        }

        return $post_array;
    }
}