<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grados extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AnioModel', 'anios');
        $this->load->model('GradosModel', 'grados');

    }

    public function index()
    {
        $this->data['titulo'] = 'Grados';
        $this->data['listar'] = $this->grados->listar();
        $this->load->view('header', $this->data);
        $this->load->view('grados/grados');
        $this->load->view('footer');
    }

    public function registrar()
    {
        $this->data['titulo'] = 'Registro';
        $this->data['action'] = 'grados/Grados/guardar';
        $this->data['anios'] = $this->anios->listar();
        $this->load->view('header', $this->data);
        $this->load->view('grados/registro', $this->data);
        $this->load->view('footer');
    }

    public function guardar()
    {
        $anios_id = $this->input->post('anios_id');
        $grado = $this->input->post('grado');
        $result = $this->grados->guardar($anios_id, $grado);
        redirect('grados/Grados', 'location');

    }

    public function modificar($id)
    {
        $this->data['id'] = $id;
        $this->data['action'] = 'grados/Grados/editar';
        $this->data['titulo'] = 'Modificar';
        $this->data['grados'] = $this->grados->buscar($id);
        $this->load->view('header', $this->data);
        $this->load->view('grados/registro', $this->data);
        $this->load->view('footer');
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $grado = $this->input->post('grado');
        $resultado = $this->grados->editar($id, $grado);
        if ($resultado) {
            redirect(base_url('grados/Grados'));
        } else {
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
            $this->data['action'] = 'grados/Grados/guardar';
            $this->data['url'] = 'grados/Grados';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->grados->eliminar($id);
        if ($resultado) {
            redirect(base_url('grados/Grados'));
        }
    }
}