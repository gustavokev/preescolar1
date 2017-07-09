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
        $this->data['titulo'] = 'docentes';
        $this->data['listar1'] = $this->docentes->listar1();
        $this->data['listar2'] = $this->docentes->listar2();
        $this->data['listar3'] = $this->docentes->listar3();
        $this->load->view('header', $this->data);
        $this->load->view('docentes/docentes');
        $this->load->view('footer');
    }

    public function registrar()
    {   
        $this->data['titulo'] = 'Registrar';
        $this->data['action'] = 'docentes/Docentes/guardar';
        $this->data['estados'] = $this->estados->listar();
        $this->load->view('header', $this->data);
        $this->load->view('docentes/registro', $this->data);
        $this->load->view('footer');
        
    }

    public function guardar()
    {
        echo 'fff';
        exit;
        $cedula = $this->input->post('cedula');
        $nombre_re = $this->input->post('nombre_re');
        $apellido_re = $this->input->post('apellido_re');
        $telefono = $this->input->post('telefono');
        $celular = $this->input->post('celular');
        $email = $this->input->post('email');
        $estatus = $this->input->post('estatus');
        $estados_id = $this->input->post('estados_id');
        $municipios_id = $this->input->post('municipios_id');
        $parroquias_id = $this->input->post('parroquias_id');
        $direccion = $this->input->post('direccion');
        $resultado = $this->docentes->guardar($cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estatus, $estados_id, $municipios_id, $parroquias_id, $direccion);
        if($resultado){
            redirect(base_url('docentes/Docentes'));
        }else{
            $this->data['error'] = 'error';
            $this->data['action'] = 'docentes/Docentes/guardar';
            $this->data['url']   = 'docentes/Docentes';
            $this->data['titulo'] = 'Registrar';
            $this->load->view('docentes/registro', $this->data);
        }
    }

    public function modificar($id)
    {
        $this->data['id']      = $id;
        $this->data['action'] = 'docentes/Docentes/editar';
        $this->data['titulo'] = 'Modificar';
        $this->data['docentes'] = $this->docentes->buscar($id);
        $this->data['estados'] = $this->estados->listar();
        $this->load->view('header', $this->data);
        $this->load->view('docentes/registro', $this->data);
        $this->load->view('footer'); 
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
        $estatus = $this->input->post('estatus');
        $estados_id = $this->input->post('estados_id');
        $municipios_id = $this->input->post('municipios_id');
        $parroquias_id = $this->input->post('parroquias_id');
        $direccion = $this->input->post('direccion');
        
        $resultado = $this->docentes->editar($id, $cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estatus, $estados_id, $municipios_id, $parroquias_id, $direccion);
        if($resultado){
            redirect(base_url('docentes/Docentes'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
            $this->data['action'] = 'docentes/Docentes/guardar';
            $this->data['url']   = 'docentes/Docentes';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->docentes->eliminar($id);
        if($resultado){
            redirect(base_url('docentes/Docentes'));
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
        $this->data['docentes'] = $this->docentes->busca($this->buscar);

        $this->data['titulo'] = 'Busqueda de docente';
        $this->load->view('header', $this->data);
        $this->load->view('docentes/buscar');
        $this->load->view('footer');
    }
}
