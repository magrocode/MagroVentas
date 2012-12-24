<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    	$this->check_isvalidated();
    }

	public function index()
	{
		$data['usuario_nombre'] = $this->session->userdata('nombre');
		
		$this->load->view('templates/header');
		$this->load->view('templates/main_menu', $data);
		$this->load->view('paginas/home');
		$this->load->view('templates/footer');
	}

	public function view($pagina = 'home')
	{
				
		if ( ! file_exists('application/views/paginas/'.$pagina.'.php'))
		{
			// Whoops, we don't have a pagina for that!
			show_404();
		}
		
		$data['usuario_nombre'] = $this->session->userdata('nombre');
		$data['title'] = ucfirst($pagina); // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/main_menu', $data);
		$this->load->view('paginas/'.$pagina, $data);
		$this->load->view('templates/footer', $data);

	}

	private function check_isvalidated(){
		// valida el estado de la sesion
		if(! $this->session->userdata('validated')){
			redirect('sesion');
		}
	}
}
