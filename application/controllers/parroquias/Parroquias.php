<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parroquias extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('ParroquiasModel', 'parroquias');
        $this->load->model('MunicipiosModel', 'municipios');
        $this->load->model('EstadosModel', 'estados');

    }

    public function index()
    {
        $this->load->helper(array('dateformat'));
        $this->data['titulo'] = 'Parroquias';
        $this->data['listar'] = $this->parroquias->listar();
        $this->load->view('header', $this->data);
        $this->load->view('parroquias/parroquias');
        $this->load->view('footer');
    }

    public function registrar()
    {
        $this->data['titulo']  = 'Registrar';
        $this->data['action']  = 'parroquias/Parroquias/guardar';
        $this->data['estados'] = $this->estados->listar();
        $this->load->view('header', $this->data);
        $this->load->view('parroquias/registro', $this->data);
        $this->load->view('footer');
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
        redirect('parroquias/Parroquias', 'location');
    }

    public function modificar($id)
    {
        $this->data['id']      = $id;
        $this->data['action'] = 'parroquias/Parroquias/editar';
        $this->data['titulo'] = 'Modificar';
        $this->data['parroquias'] = $this->parroquias->buscar($id);
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
            redirect(base_url('parroquias/Parroquias'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
            $this->data['action'] = 'parroquias/Parroquias/guardar';
            $this->data['url']   = 'parroquias/Parroquias';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->parroquias->eliminar($id);
        if($resultado){
            redirect(base_url('parroquias/Parroquias'));
        }
    }
}
