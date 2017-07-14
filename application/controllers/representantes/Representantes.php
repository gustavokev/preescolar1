<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Representantes extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('RepresentantesModel', 'representantes');
        $this->load->model('EstadosModel', 'estados');
        $this->load->model('MunicipiosModel', 'municipios');
        $this->load->model('ParroquiasModel', 'parroquias');
        $this->load->model('SectoresModel', 'sectores');

    }

    public function index()
    {
        $this->load->helper(array('dateformat', 'mayusculas', 'mayusculas1', 'unidad'));
        $titulo = 'Representantes';
        $listar = $this->representantes->listar();
        $this->twig->display('representantes/representantes', compact('titulo', 'listar'));
    }

    public function registrar()
    {
        $titulo = 'Registrar';
        $action = 'representantes/Representantes/guardar';
        $estados = $this->estados->listar();
        $this->twig->display('representantes/registro', compact('titulo', 'action', 'estados'));
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
        $sectores_id = $this->input->post('sectores_id');
        $direccion = $this->input->post('direccion');
        $resultado = $this->representantes->guardar($cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estados_id, $municipios_id, $parroquias_id, $sectores_id, $direccion);
        if($resultado){
            redirect(base_url('representantes/Representantes'));
        }else{

            $error =  'error';
            $action= 'representantes/Representantes/guardar';
            $url =  'representantes/Representantes';
            $titulo = 'Registrar';
            $this->twig->display('representantes/registro', compact('titulo', 'action', 'estados', 'url', 'error'));
        }
    }

    public function modificar($id)
    {
        $id    = $id;
        $action = 'representantes/Representantes/editar';
        $titulo = 'Modificar';
        $representantes = $this->representantes->buscar($id);

        $estados = $this->estados->listar();
        $municipios = $this->municipios->listar();
        $parroquias = $this->parroquias->listar();
        $parroquias = $this->parroquias->listar();
        $sectores = $this->sectores->listar();

        $this->twig->display('representantes/registro', compact('titulo', 'action', 'estados', 'municipios', 'parroquias', 'sectores', 'representantes'));
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
        $sectores_id = $this->input->post('sectores_id');
        $direccion = $this->input->post('direccion');

        $resultado = $this->representantes->editar($id, $cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estados_id, $municipios_id, $parroquias_id, $sectores_id, $direccion);

        if($resultado){
            redirect(base_url('representantes/Representantes'));
        }else{
            $metodo= 'guardar';
            $error = 'error';
            $action= 'representantes/Representantes/guardar';
            $url  =  'representantes/Representantes';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->representantes->eliminar($id);
        if($resultado){
            redirect(base_url('representantes/Representantes'));
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
        $representantes = $this->representantes->busca($this->buscar);

        $titulo = 'Busqueda de Representante';
        $this->load->view('header', $this->data);
        $this->load->view('representantes/buscar');
        $this->load->view('footer');
    }

    public function comprobar_cedula_ajax() 
    {
        $cedula = $this->input->post('cedula');
        $comprobar_cedula = $this->representantes->verifica_cedula($cedula);
        if ($comprobar_cedula) {
            $this->form_validation->set_message('comprobar_cedula_ajax', '%s: ya existe en la base de datos');
            return FALSE;
        } else {
            echo '<div style="display:none">1</div>';
            return TRUE;
        }
    }

    public function comprobar_email_ajax() 
    {
        $email = $this->input->post('email');
        $comprobar_email = $this->representantes->verifica_email($email);
        if ($comprobar_email) {
            $this->form_validation->set_message('comprobar_email_ajax', '%s: ya existe en la base de datos');
            return FALSE;
        } else {
            echo '<div style="display:none">1</div>';
            return TRUE;
        }
    }
}
