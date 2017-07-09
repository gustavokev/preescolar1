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
		$this->data['titulo'] = 'Secciones';
		$this->data['listar'] = $this->secciones->listar();
		$this->load->view('header', $this->data);
        $this->load->view('secciones/secciones');
		$this->load->view('footer');
	}

	public function registrar()
    {	
        $this->data['titulo'] = 'Registro';
        $this->data['action'] = 'secciones/Secciones/guardar';
        $this->load->view('header', $this->data);
        $this->load->view('secciones/registro', $this->data);
		$this->load->view('footer');
    }

    public function guardar()
    {
        $seccion = $this->input->post('seccion');
        $resultado = $this->secciones->guardar($seccion);
        if($resultado){
            redirect(base_url('secciones/Secciones'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
        	$this->data['action'] = 'secciones/Secciones/guardar';
            $this->data['url']   = 'secciones/Secciones';
            $this->data['titulo'] = 'Registro';
            $this->load->view('secciones/registro', $this->data);
        }
    }

    public function modificar($id)
    {
        $this->data['id']      = $id;
        $this->data['action'] = 'secciones/Secciones/editar';
        $this->data['titulo'] = 'Modificar';
        $this->data['secciones'] = $this->secciones->buscar($id);
        $this->load->view('header', $this->data);
        $this->load->view('secciones/registro', $this->data);
		$this->load->view('footer'); 
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $seccion = $this->input->post('seccion');
        $resultado = $this->secciones->editar($id, $seccion);
        if($resultado){
            redirect(base_url('secciones/Secciones'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
            $this->data['action'] = 'secciones/Secciones/guardar';
            $this->data['url']   = 'secciones/Secciones';
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
