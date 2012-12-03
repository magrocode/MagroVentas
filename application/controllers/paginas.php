<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginas extends CI_Controller {

	function __construct()
    {
    	parent::__construct();

    	//$this->load->helper('url');
        //$this->load->helper('html');
    }

	public function index()
	{
		$this->load->view('templates/header');
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
		
		$data['title'] = ucfirst($pagina); // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view('paginas/'.$pagina, $data);
		$this->load->view('templates/footer', $data);

	}
}
