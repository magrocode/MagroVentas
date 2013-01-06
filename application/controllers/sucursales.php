<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sucursales extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->check_isvalidated();	
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

 	function nuevo()
 	{
 		//el id de la compañia oculto
 		$data['companya_id'] = $this->session->userdata('companya_id');

 		//reglas de validacion
 		$this->form_validation->set_rules('codigo', 'codigo', 'required|trim|max_length[20]');
 		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[5]'); 		

 		//comprueba si pasa la validacion para insertar el registro
 		if($this->form_validation->run() == FALSE)
 		{
 			//vuelve al formulario para mostrar errores
 			$this->load->view('templates/header');
			$this->load->view('templates/main_menu');
 			$this->load->view('sucursales/nuevo', $data);
 			$this->load->view('templates/footer');
 		}
 		else
 		{
 			//inserta el nuevo registro
 			//recupera datos de la vista
	 		$data['companya_id'] = $this->input->post('companya_id');
	 		$data['codigo'] = $this->input->post('codigo');
	 		$data['nombre'] = $this->input->post('nombre');

	 		//carga modelo e inserta el registro
	 		$this->load->model('sucursal_model');
			$this->sucursal_model->insertar($data);

			//mensaje exitoso
			$mensaje['mensaje'] = "<strong>Asi se hace!</strong> Se ha insertado una nueva sucursal";
			$this->load->view('templates/form_success', $mensaje);

			//mostrar sucursal
	 		$this->index();
	 	}
 	}


 	function editar($suc)
 	{
 		//cargamos el modelo y obtenemos la información del contacto seleccionado.
		$this->load->model('sucursal_model');
		$datos['sucursal'] = $this->sucursal_model->obtenerSucursal($suc);

		$data['id'] = $datos['sucursal'][0]->id;
		$data['companya_id'] = $datos['sucursal'][0]->companya_id;
		$data['codigo'] = $datos['sucursal'][0]->codigo;
		$data['nombre'] = $datos['sucursal'][0]->nombre;

		//cargar vistas
 		$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
		$this->load->view('sucursales/editar', $data);
		$this->load->view('templates/footer');

 	}

 	
 	function actualizar() {

 		//recupera datos de la vista
 		$data['id'] = $this->input->post('id');
	 	$data['companya_id'] = $this->input->post('companya_id');
	 	$data['codigo'] = $this->input->post('codigo');
	 	$data['nombre'] = $this->input->post('nombre');

		//reglas de validacion
 		$this->form_validation->set_rules('codigo', 'codigo', 'required|trim|max_length[20]');
 		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[5]'); 		

 		//comprueba si pasa la validacion para insertar el registro
 		if($this->form_validation->run() == FALSE)
 		{
 			//vuelve al formulario para mostrar errores
 			$this->load->view('templates/header');
			$this->load->view('templates/main_menu');
 			$this->load->view('sucursales/editar', $data);
 			$this->load->view('templates/footer');
 		}
 		else
 		{

	 		//carga modelo e inserta el registro
	 		$this->load->model('sucursal_model');
			$this->sucursal_model->actualizar($data);

			//mensaje exitoso
			$mensaje['mensaje'] = "<strong>Muy Bien!</strong> Se ha actualizado la sucursal";
			$this->load->view('templates/form_success', $mensaje);

			//mostrar sucursal
	 		$this->mostrar($data['id']);
	 	}
	}

	function mostrar($suc){
		//carga modelo sucursal
		$this->load->model('sucursal_model');
		$datos['sucursal'] = $this->sucursal_model->obtenerSucursal($suc);

		//recupera los campos
		$data['id'] = $datos['sucursal'][0]->id;
		$data['companya_id'] = $datos['sucursal'][0]->companya_id;
		$data['codigo'] = $datos['sucursal'][0]->codigo;
		$data['nombre'] = $datos['sucursal'][0]->nombre;

		//carga vistas
	 	$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
	 	$this->load->view('sucursales/mostrar', $data);
	 	$this->load->view('templates/footer');
	}

	function eliminar($sucursal_id) {
		//cargamos el modelo y llamamos a la función baja(), pasándole el nombre del registro que queremos borrar.
		$this->load->model('sucursal_model');
		$this->sucursal_model->eliminar($sucursal_id);
		
		//mostramos la vista de nuevo.
		$this->index();
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