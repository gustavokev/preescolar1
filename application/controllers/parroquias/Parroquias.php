<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parroquias extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('SectoresModel', 'sectores');
        $this->load->model('ParroquiasModel', 'parroquias');
        $this->load->model('MunicipiosModel', 'municipios');
        $this->load->model('EstadosModel', 'estados');

    }

    public function index()
    {
        $this->load->helper(array('dateformat'));
        $titulo = 'Parroquias';
        $listar = $this->parroquias->listar();
        $this->twig->display('parroquias/parroquias', compact('titulo', 'listar'));  
    }

    public function registrar()
    {
        $titulo  = 'Registrar';
        $action  = 'parroquias/parroquias/guardar';
        $municipios = $this->municipios->listar();
        $this->twig->display('parroquias/registro', compact('titulo', 'action', 'municipios'));
    }

    public function searchParMun($municipios_id)
    {
       $parroquias = $this->parroquias->searchParMun($municipios_id);
       echo json_encode($parroquias);
    }

    public function guardar()
    {
        $municipios_id = $this->input->post('municipios_id');
        $parroquia = $this->input->post('parroquia');
        $resultado = $this->parroquias->guardar($municipios_id, $parroquia);
        redirect('parroquias/parroquias', 'location');
    }

    public function modificar($id)
    {
        $id      = $id;
        $action = 'parroquias/parroquias/editar';
        $titulo = 'Modificar';
        $parroquias = $this->parroquias->buscar($id);
        $this->load->view('header', $this->data);
        $this->load->view('parroquias/registro', $this->data);
        $this->load->view('footer');
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $parroquia = $this->input->post('parroquia');
        $resultado = $this->parroquias->editar($id, $parroquia);
        if($resultado){
            redirect(base_url('parroquias/parroquias'));
        }else{
            $metodo = 'guardar';
            $error = 'error';
            $action = 'parroquias/parroquias/guardar';
            $url   = 'parroquias/parroquias';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->parroquias->eliminar($id);
        if($resultado){
            redirect(base_url('parroquias/parroquias'));
        }
    }
}
