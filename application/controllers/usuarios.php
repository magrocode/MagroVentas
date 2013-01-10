<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->check_isvalidated();	
	}

	function index() {
		$this->load->model('usuario_model'); //cargamos el modelo

 		$data['page_title'] = "Usuarios";

 		//Obtener datos de la tabla 'contacto'
 		$usuarios = $this->usuario_model->getData(); //llamamos a la función getData() del modelo creado anteriormente.

		$data['usuarios'] = $usuarios;

 		//load de vistas
		$this->load->view('templates/header');
		$this->load->view('templates/main_menu');
 		$this->load->view('usuarios/index', $data); 
 		$this->load->view('templates/footer'); 
 	}

 	function nuevo()
 	{
 		//el id de la compañia oculto
 		$data['companya_id'] = $this->session->userdata('companya_id');

 		//reglas de validacion
 		$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|callback_check_email_unico');
 		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[5]'); 		
 		$this->form_validation->set_rules('apellidos', 'apellidos', 'required|trim|min_length[5]');
 		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]|matches[confirmacion]');
 		$this->form_validation->set_rules('confirmacion', 'confirmacion', 'required|trim|min_length[6]');
 	

 		//comprueba si pasa la validacion para insertar el registro
 		if($this->form_validation->run() == FALSE)
 		{
 			//vuelve al formulario para mostrar errores
 			$this->load->view('templates/header');
			$this->load->view('templates/main_menu');
 			$this->load->view('usuarios/nuevo', $data);
 			$this->load->view('templates/footer');
 		}
 		else
 		{
 			//inserta el nuevo registro
 			//recupera datos de la vista
	 		$data['companya_id'] = $this->input->post('companya_id');
	 		$data['email'] = $this->input->post('email');
	 		$data['nombre'] = $this->input->post('nombre');
	 		$data['apellidos'] = $this->input->post('apellidos');
	 		$data['password'] = do_hash(do_hash($this->input->post('password')), 'md5'); 

	 		//carga modelo e inserta el registro
	 		$this->load->model('usuario_model');
			$this->usuario_model->insertar($data);

			//mensaje exitoso
			$mensaje['mensaje'] = "<strong>Asi se hace!</strong> Se ha insertado un nuevo usuario";
			$this->load->view('templates/form_success', $mensaje);

			//mostrar sucursal
	 		$this->index();
	 	}
 	}

 	function check_email_unico($email)
    {
    	//carga modelo e inserta el registro
	 	$this->load->model('usuario_model');

        if ($this->usuario_model->buscar_email($email) == TRUE)
        {
            $this->form_validation->set_message('check_email_unico', 'El email ya esta en uso.');
            return FALSE;
        }
        else
        {
            return TRUE;
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