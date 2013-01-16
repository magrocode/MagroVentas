<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        $this->check_isvalidated(); 
    }

    function index() {

        $this->load->model('proveedor_model'); //cargamos el modelo

        $data['page_title'] = "Proveedores";

        //Obtener datos de la tabla 'contacto'
        $proveedores = $this->proveedor_model->getData(); //llamamos a la función getData() del modelo creado anteriormente.

        $data['proveedores'] = $proveedores;

        //load de vistas
        $this->load->view('templates/header');
        $this->load->view('templates/main_menu');
        $this->load->view('proveedores/index', $data); 
        $this->load->view('templates/footer'); 
    }

    function nuevo()
    {
        //el id de la compañia oculto
        $data['companya_id'] = $this->session->userdata('companya_id');

        //reglas de validacion
        $this->form_validation->set_rules('rut', 'rut', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('nombre', 'nombre', 'required|trim|max_length[250]');       

        //comprueba si pasa la validacion para insertar el registro
        if($this->form_validation->run() == FALSE)
        {
            //vuelve al formulario para mostrar errores
            $this->load->view('templates/header');
            $this->load->view('templates/main_menu');
            $this->load->view('proveedores/nuevo', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            //inserta el nuevo registro
            //recupera datos de la vista
            $data['companya_id'] = $this->input->post('companya_id');
            $data['rut'] = $this->input->post('rut');
            $data['nombre'] = $this->input->post('nombre');

            //carga modelo e inserta el registro
            $this->load->model('proveedor_model');
            $this->proveedor_model->insertar($data);

            //mensaje exitoso
            $mensaje['mensaje'] = "<strong>Asi se hace!</strong> Se ha insertado un nuevo proveedor";
            $this->load->view('templates/form_success', $mensaje);

            //mostrar sucursal
            $this->index();
        }
    }


    function editar($proveedor)
    {
        //cargamos el modelo y obtenemos la información del contacto seleccionado.
        $this->load->model('proveedor_model');
        $datos['proveedor'] = $this->proveedor_model->obtener($proveedor);

        $data['id'] = $datos['proveedor'][0]->id;
        $data['companya_id'] = $datos['proveedor'][0]->companya_id;
        $data['rut'] = $datos['proveedor'][0]->rut;
        $data['nombre'] = $datos['proveedor'][0]->nombre;

        //cargar vistas
        $this->load->view('templates/header');
        $this->load->view('templates/main_menu');
        $this->load->view('proveedores/editar', $data);
        $this->load->view('templates/footer');

    }

    
    function actualizar() {

        //recupera datos de la vista
        $data['id'] = $this->input->post('id');
        $data['companya_id'] = $this->input->post('companya_id');
        $data['rut'] = $this->input->post('rut');
        $data['nombre'] = $this->input->post('nombre');

        //reglas de validacion
        $this->form_validation->set_rules('rut', 'rut', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('nombre', 'nombre', 'required|trim|max_length[250]');       

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
            $this->load->model('proveedor_model');
            $this->proveedor_model->actualizar($data);

            //mensaje exitoso
            $mensaje['mensaje'] = "<strong>Muy Bien!</strong> Se ha actualizado el proveedor";
            $this->load->view('templates/form_success', $mensaje);

            //mostrar sucursal
            $this->mostrar($data['id']);
        }
    }

    function mostrar($proveedor){
        //carga modelo proveedor
        $this->load->model('proveedor_model');
        $datos['proveedor'] = $this->proveedor_model->obtener($proveedor);

        //recupera los campos
        $data['id'] = $datos['proveedor'][0]->id;
        $data['companya_id'] = $datos['proveedor'][0]->companya_id;
        $data['rut'] = $datos['proveedor'][0]->rut;
        $data['nombre'] = $datos['proveedor'][0]->nombre;

        //carga vistas
        $this->load->view('templates/header');
        $this->load->view('templates/main_menu');
        $this->load->view('proveedores/mostrar', $data);
        $this->load->view('templates/footer');
    }

    function eliminar($proveedor_id) {
        //cargamos el modelo y llamamos a la función baja(), pasándole el nombre del registro que queremos borrar.
        $this->load->model('proveedor_model');
        $this->proveedor_model->eliminar($proveedor_id);
        
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