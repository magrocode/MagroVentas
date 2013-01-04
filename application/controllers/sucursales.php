<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sucursales extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();	
	}

	function index() {
		$this->load->model('sucursal_model'); //cargamos el modelo

 		$data['page_title'] = "Sucursales";

 		//Obtener datos de la tabla 'contacto'
 		$sucursales = $this->sucursal_model->getData(); //llamamos a la función getData() del modelo creado anteriormente.

		$data['sucursales'] = $sucursales;

 		//load de vistas
		$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
 		$this->load->view('sucursales/index', $data); 
 		$this->load->view('templates/footer'); 
 	}

 	function editar($suc)
 	{
 		//cargamos el modelo y obtenemos la información del contacto seleccionado.
		$this->load->model('sucursal_model');
		$data['sucursal'] = $this->sucursal_model->obtenerSucursal($suc);

		//cargamos la vista para editar la información, pasandole dicha información.
		$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
		$this->load->view('sucursales/editar', $data);
		$this->load->view('templates/footer');

 	}

 	
 	function actualizar() {
		//recogemos los datos por POST
		//$data['id'] = $_POST['id'];
		//$data['codigo'] = $_POST['inputCodigo'];
	 	//$data['nombre'] = $_POST['inputNombre'];

	 	$data['sucursal'] = array("id" => $_POST['id'],
	 							"codigo" => $_POST['inputCodigo'],
	 							"nombre" => $_POST['inputNombre']
	 							);

		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('sucursales/editar', $data);
        }
        else
        {
        	$this->load->model('sucursal_model');
			$this->sucursal_model->update($data);

			$this->load->view('templates/header');
			$this->load->view('templates/main_menu');
            $this->load->view('templates/form_success');
            $this->load->view('templates/footer');
        }



		//cargamos el modelo y llamamos a la función update()
		//$this->load->model('sucursal_model');
		//$this->sucursal_model->update($data);
		
		//volvemos a cargar la primera vista
		//$this->index();
	}

}