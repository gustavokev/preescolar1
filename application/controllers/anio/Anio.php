<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anio extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('AnioModel', 'anio');

    }

	public function index()
	{
        $this->load->helper(array('dateformat'));
		$titulo = 'Año Escolar';
		$listar = $this->anio->listar();
		$this->twig->display('anio/anio', compact('titulo', 'listar'));
	}

	public function registrar()
    {	
        $titulo = 'Registro';
        $action = 'anio/anio/guardar';
        $this->twig->display('anio/registro', compact('titulo', 'action'));
    }

    public function guardar()
    {
        $anio = $this->input->post('anio');
        $resultado = $this->anio->guardar($anio);
        if($resultado){
            redirect(base_url('anio/anio'));
        }else{
            $error = 'error';
        	$action = 'anio/anio/guardar';
            $url   = 'anio/anio';
            $titulo = 'Registro';
            $this->twig->display('anio/registro', compact('titulo', 'action', 'error', 'url'));
        }
    }

    public function modificar($id)
    {
        $action = 'anio/anio/editar';
        $titulo = 'Modificar';
        $anios = $this->anio->buscar($id);
        $this->twig->display('anio/registro', compact('titulo', 'action', 'anios')); 
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $anio = $this->input->post('anio');
        $resultado = $this->anio->editar($id, $anio);
        if($resultado){
            redirect(base_url('anio/anio'));
        }else{
            $metodo = 'guardar';
            $error = 'error';
            $action = 'anio/anio/guardar';
            $url   = 'anio/anio';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->anio->eliminar($id);
        if($resultado){
            redirect(base_url('anio/Anio'));
        }
    }
}
