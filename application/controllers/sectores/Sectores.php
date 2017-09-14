<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectores extends CI_Controller {

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
        $titulo = 'Sectores';
        $listar = $this->sectores->listar();
        $this->twig->display('sectores/sectores', compact('titulo', 'listar'));
    }

    public function registrar()
    {
        $titulo  = 'Registrar';
        $action  = 'sectores/Sectores/guardar';
        $parroquias = $this->parroquias->listar();
        $this->twig->display('Sectores/registro', compact('titulo', 'action', 'parroquias'));
    }

    public function searchSerPar($parroquias_id)
    {
       $sectores = $this->sectores->searchSerPar($parroquias_id);
       echo json_encode($sectores);
    }

    public function guardar()
    {
        $parroquias_id = $this->input->post('parroquias_id');
        $sector = $this->input->post('sector');
        $resultado = $this->sectores->guardar($parroquias_id, $sector);
        redirect('sectores/Sectores', 'location');
    }

    public function modificar($id)
    {
        $id      = $id;
        $action = 'sectores/Sectores/editar';
        $titulo = 'Modificar';
        $sectores = $this->sectores->buscar($id);
        $parroquias = $this->parroquias->listar();
        $this->twig->display('sectores/registro', compact('action', 'titulo', 'sectores', 'parroquias'));
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $parroquia = $this->input->post('parroquia');
        $resultado = $this->sectores->editar($id, $parroquia);
        if($resultado){
            redirect(base_url('sectores/Sectores'));
        }else{
            $metodo = 'guardar';
            $error = 'error';
            $action = 'sectores/Sectores/guardar';
            $url   = 'sectores/sectores';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->sectores->eliminar($id);
        if($resultado){
            redirect(base_url('sectores/sectores'));
        }
    }
}
