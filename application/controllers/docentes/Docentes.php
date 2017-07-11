<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docentes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DocentesModel', 'docentes');
        $this->load->model('EstadosModel', 'estados');
        $this->load->model('MunicipiosModel', 'municipios');
        $this->load->model('ParroquiasModel', 'parroquias');

    }

    public function index()
    {
        $this->load->helper(array('dateformat', 'mayusculas', 'mayusculas1', 'unidad'));
        $titulo = 'docentes';
        $listar = $this->docentes->listar();
        $this->twig->display('docentes/docentes', compact('titulo', 'listar'));
    }

    public function registrar()
    {
        $titulo = 'Registrar';
        $action = 'docentes/docentes/guardar';
        $estados = $this->estados->listar();
        $this->twig->display('docentes/registro', compact('titulo', 'action', 'estados'));
    }

    public function guardar()
    {


        $cedula = $this->input->post('cedula');
        $nombre_re = $this->input->post('nombre_re');
        $apellido_re = $this->input->post('apellido_re');
        $telefono = $this->input->post('telefono');
        $celular = $this->input->post('celular');
        $email = $this->input->post('email');
        $estados_id = $this->input->post('estados_id');
        $municipios_id = $this->input->post('municipios_id');
        $parroquias_id = $this->input->post('parroquias_id');
        $direccion = $this->input->post('direccion');
        $resultado = $this->docentes->guardar($cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estados_id, $municipios_id, $parroquias_id, $direccion);
        if($resultado){
            redirect(base_url('docentes/docentes'));
        }else{

            $error =  'error';
            $action= 'docentes/docentes/guardar';
            $url =  'docentes/docentes';
            $titulo = 'Registrar';
            $this->twig->display('docentes/registro', compact('titulo', 'action', 'estados', 'url', 'error'));
        }
    }

    public function modificar($id)
    {
        $id    = $id;
        $action = 'docentes/docentes/editar';
        $titulo = 'Modificar';
        $docentes = $this->docentes->buscar($id);
        $estados = $this->estados->listar();

        $this->twig->display('docentes/registro', compact('titulo', 'action', 'estados', 'docentes'));
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $cedula = $this->input->post('cedula');
        $nombre_re = $this->input->post('nombre_re');
        $apellido_re = $this->input->post('apellido_re');
        $telefono = $this->input->post('telefono');
        $celular = $this->input->post('celular');
        $email = $this->input->post('email');
        $estados_id = $this->input->post('estados_id');
        $municipios_id = $this->input->post('municipios_id');
        $parroquias_id = $this->input->post('parroquias_id');
        $direccion = $this->input->post('direccion');

        $resultado = $this->docentes->editar($id, $cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estados_id, $municipios_id, $parroquias_id, $direccion);
        if($resultado){
            redirect(base_url('docentes/docentes'));
        }else{
            $metodo= 'guardar';
            $error = 'error';
            $action= 'docentes/docentes/guardar';
            $url  =  'docentes/docentes';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->docentes->eliminar($id);
        if($resultado){
            redirect(base_url('docentes/docentes'));
        }
    }

    public function buscar()
    {
        if ($_POST) {
            $this->buscar = $this->input->post('busqueda');
        }else{
            $this->buscar = '';
        }
        $this->load->helper(array('dateformat', 'mayusculas', 'mayusculas1', 'unidad'));
        $represeantes = $this->docentes->busca($this->buscar);

        $titulo = 'Busqueda de Representante';
        $this->load->view('header', $this->data);
        $this->load->view('docentes/buscar');
        $this->load->view('footer');
    }
}
