<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipios extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('MunicipiosModel', 'municipios');
        $this->load->model('EstadosModel', 'estados');

    }

	public function index()
	{
        $this->load->helper(array('dateformat'));
		$titulo = 'Municipios';
		$listar = $this->municipios->listar();
		$this->twig->display('municipios/municipios', compact('titulo', 'listar'));
	}

	public function registrar()
    {
        $titulo = 'Registrar';
        $action = 'municipios/Municipios/guardar';
        $estados = $this->estados->listar();
        $this->twig->display('municipios/registro', compact('titulo', 'action', 'estados'));
    }

    public function searchMunEst($estados_id)
    {
       $municipios = $this->municipios->searchMunEst($estados_id);
       echo json_encode($municipios);
    }

    public function guardar()
    {
        $estados_id = $this->input->post('estados_id');
        $municipio = $this->input->post('municipio');
        $resultado = $this->municipios->guardar($estados_id, $municipio);
        if($resultado){
            redirect(base_url('municipios/Municipios'));
        }else{
            $metodo = 'guardar';
            $error = 'error';
            $action = 'municipios/Municipios/guardar';
            $url   = 'municipios/Municipios';
            $this->twig->display('anio/registro', compact('titulo', 'action', 'error', 'url'));
        }
    }

    public function modificar($id)
    {
        $id      = $id;
        $action = 'municipios/Municipios/editar';
        $titulo = 'Modificar';
        $municipios = $this->municipios->buscar($id);
        $estados = $this->estados->listar();
        $this->twig->display('municipios/registro', compact('action', 'titulo', 'municipios', 'estados'));
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $municipio = $this->input->post('municipio');
        $resultado = $this->municipios->editar($id, $municipio);
        if($resultado){
            redirect(base_url('municipios/Municipios'));
        }else{
            $metodo = 'guardar';
            $error = 'error';
            $action = 'municipios/Municipios/guardar';
            $url   = 'municipios/Municipios';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->municipios->eliminar($id);
        if($resultado){
            redirect(base_url('municipios/Municipios'));
        }
    }
}
