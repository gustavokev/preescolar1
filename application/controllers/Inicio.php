<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('InicioModel', 'inicio');
    }

	public function index()
	{
		$titulo = 'Inicio';
        $this->twig->display('inicio/inicio', compact('titulo'));
	}

    public function hola()
    {
        $this->data['titulo'] = 'Inicio';
        $this->twig->display('inicio/hola', compact('title'),$this->data);
    }
}


