<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companyas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->check_isvalidated();	
	}

	function mostrar($companya_id){
		//carga modelo companya
		$this->load->model('companya_model');
		$datos['companya'] = $this->companya_model->obtenerCompanya($companya_id);

		//recupera los campos
		$data['id'] = $datos['companya'][0]->id;
		$data['rut'] = $datos['companya'][0]->rut;
		$data['nombre'] = $datos['companya'][0]->nombre;
		$data['direccion'] = $datos['companya'][0]->direccion;

		//carga vistas
	 	$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
	 	$this->load->view('companyas/mostrar', $data);
	 	$this->load->view('templates/footer');
	}

	function editar($companya_id)
 	{
 		//cargamos el modelo y obtenemos la información del contacto seleccionado.
		$this->load->model('companya_model');
		$datos['companya'] = $this->companya_model->obtenerCompanya($companya_id);

		$data['id'] = $datos['companya'][0]->id;
		$data['rut'] = $datos['companya'][0]->rut;
		$data['nombre'] = $datos['companya'][0]->nombre;
		$data['direccion'] = $datos['companya'][0]->direccion;

		//cargar vistas
 		$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
		$this->load->view('companyas/editar', $data);
		$this->load->view('templates/footer');

 	}

 	function actualizar() {

 		//recupera datos de la vista
 		$data['id'] = $this->input->post('id');
	 	$data['rut'] = $this->input->post('rut');
	 	$data['nombre'] = $this->input->post('nombre');
	 	$data['direccion'] = $this->input->post('direccion');

		//reglas de validacion
 		$this->form_validation->set_rules('rut', 'rut', 'required|trim|max_length[20]');
 		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[5]'); 		
 		$this->form_validation->set_rules('direccion', 'direccion', 'trim'); 	

 		//comprueba si pasa la validacion para insertar el registro
 		if($this->form_validation->run() == FALSE)
 		{
 			//vuelve al formulario para mostrar errores
 			$this->load->view('templates/header');
			$this->load->view('templates/main_menu');
 			$this->load->view('companyas/editar', $data);
 			$this->load->view('templates/footer');
 		}
 		else
 		{

	 		//carga modelo e inserta el registro
	 		$this->load->model('companya_model');
			$this->companya_model->actualizar($data);

			//mensaje exitoso
			$mensaje['mensaje'] = "<strong>Muy Bien!</strong> Se ha actualizado la compañia";
			$this->load->view('templates/form_success', $mensaje);

			//mostrar companya
	 		$this->mostrar($data['id']);
	 	}
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