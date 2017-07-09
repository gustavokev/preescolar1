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
		$this->data['titulo'] = 'Municipios';
		$this->data['listar'] = $this->municipios->listar();
		$this->load->view('header', $this->data);
        $this->load->view('municipios/municipios');
		$this->load->view('footer');
	}

	public function registrar()
    {
        $this->data['titulo'] = 'Registrar';
        $this->data['action'] = 'municipios/Municipios/guardar';
        $this->data['estados'] = $this->estados->listar();
        $this->load->view('header', $this->data);
        $this->load->view('municipios/registro', $this->data);
		$this->load->view('footer');
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
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
        	$this->data['action'] = 'municipios/Municipios/guardar';
            $this->data['url']   = 'municipios/Municipios';
            $this->data['titulo'] = 'Registro';
            $this->load->view('municipios/registro', $this->data);
        }
    }

    public function modificar($id)
    {
        $this->data['id']      = $id;
        $this->data['action'] = 'municipios/Municipios/editar';
        $this->data['titulo'] = 'Modificar';
        $this->data['municipios'] = $this->municipios->buscar($id);
        $this->load->view('header', $this->data);
        $this->load->view('municipios/registro', $this->data);
		$this->load->view('footer');
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $municipio = $this->input->post('municipio');
        $resultado = $this->municipios->editar($id, $municipio);
        if($resultado){
            redirect(base_url('municipios/Municipios'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
            $this->data['action'] = 'municipios/Municipios/guardar';
            $this->data['url']   = 'municipios/Municipios';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->municipios->eliminar($estados_id, $id);
        if($resultado){
            redirect(base_url('municipios/Municipios'));
        }
    }
}
