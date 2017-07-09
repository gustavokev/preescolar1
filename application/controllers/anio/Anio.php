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
		$this->data['titulo'] = 'Año Escolar';
		$this->data['listar'] = $this->anio->listar();
		$this->load->view('header', $this->data);
        $this->load->view('anio/anio');
		$this->load->view('footer');
	}

	public function registrar()
    {	
        $this->data['titulo'] = 'Registro';
        $this->data['action'] = 'anio/Anio/guardar';
        $this->load->view('header', $this->data);
        $this->load->view('anio/registro', $this->data);
		$this->load->view('footer');
    }

    public function guardar()
    {
        $anio = $this->input->post('anio');
        $resultado = $this->anio->guardar($anio);
        if($resultado){
            redirect(base_url('anio/Anio'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
        	$this->data['action'] = 'anio/Anio/guardar';
            $this->data['url']   = 'anio/Anio';
            $this->data['titulo'] = 'Registro';
            $this->load->view('anio/registro', $this->data);
        }
    }

    public function modificar($id)
    {
        $this->data['id']      = $id;
        $this->data['action'] = 'anio/Anio/editar';
        $this->data['titulo'] = 'Modificar';
        $this->data['anios'] = $this->anio->buscar($id);
        $this->load->view('header', $this->data);
        $this->load->view('anio/registro', $this->data);
		$this->load->view('footer'); 
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $anio = $this->input->post('anio');
        $resultado = $this->anio->editar($id, $anio);
        if($resultado){
            redirect(base_url('anio/Anio'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
            $this->data['action'] = 'anio/Anio/guardar';
            $this->data['url']   = 'anio/Anio';
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
