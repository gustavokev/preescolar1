<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('SeccionesModel', 'secciones');

    }

	public function index()
	{
        $this->load->helper(array('mayusculas'));
		$titulo = 'Secciones';
		$listar = $this->secciones->listar();
        $this->twig->display('secciones/secciones', compact('titulo', 'listar'));
	}

	public function registrar()
    {	
        $titulo = 'Registro';
        $action = 'secciones/Secciones/guardar';
        $this->twig->display('secciones/registro', compact('titulo', 'action'));
    }

    public function guardar()
    {
        $seccion = $this->input->post('seccion');
        $resultado = $this->secciones->guardar($seccion);
        if($resultado){
            redirect(base_url('secciones/Secciones'));
        }else{
            $error = 'error';
        	$action = 'secciones/Secciones/guardar';
            $url   = 'secciones/Secciones';
            $titulo = 'Registro';
            $this->twig->display('secciones/registro', compact('error', 'action', 'url', 'titulo'));
        }
    }

    public function modificar($id)
    {
        $id      = $id;
        $action = 'secciones/Secciones/editar';
        $titulo = 'Modificar';
        $secciones = $this->secciones->buscar($id);
        $this->twig->display('secciones/registro', compact('action', 'titulo', 'secciones'));
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $seccion = $this->input->post('seccion');
        $resultado = $this->secciones->editar($id, $seccion);
        if($resultado){
            redirect(base_url('secciones/Secciones'));
        }else{
            $metodo = 'guardar';
            $error = 'error';
            $action = 'secciones/Secciones/guardar';
            $url   = 'secciones/Secciones';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->secciones->eliminar($id);
        if($resultado){
            redirect(base_url('secciones/Secciones'));
        }
    }
}
