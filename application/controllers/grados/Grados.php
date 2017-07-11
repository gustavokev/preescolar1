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
        $titulo = 'Grados';
        $listar = $this->grados->listar();
        $this->twig->display('grados/grados', compact('titulo', 'listar'));
    }

    public function registrar()
    {
        $titulo = 'Registro';
        $action = 'grados/grados/guardar';
        $anios = $this->anios->listar();
        $this->twig->display('grados/registro', compact('titulo', 'action', 'anios'));
    }

    public function guardar()
    {
        $anios_id = $this->input->post('anios_id');
        $grado = $this->input->post('grado');
        $result = $this->grados->guardar($anios_id, $grado);
        redirect('grados/grados', 'location');

    }

    public function modificar($id)
    {
        $action = 'grados/grados/editar';
        $titulo = 'Modificar';
        $grados = $this->grados->buscar($id);
        $this->twig->display('grados/registro', compact('titulo', 'action', 'grados'));
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $grado = $this->input->post('grado');
        $resultado = $this->grados->editar($id, $grado);
        if ($resultado) {
            redirect(base_url('grados/Grados'));
        } else {
            $metodo = 'guardar';
            $error = 'error';
            $action = 'grados/Grados/guardar';
            $url = 'grados/Grados';
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