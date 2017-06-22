<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Representantes extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('RepresentantesModel', 'representantes');
        $this->load->model('EstadosModel', 'estados');
        $this->load->model('MunicipiosModel', 'municipios');
        $this->load->model('ParroquiasModel', 'parroquias');

    }

	public function index()
	{
        $this->load->helper(array('dateformat', 'mayusculas', 'mayusculas1', 'unidad'));
		$this->data['titulo'] = 'Representantes';
        $this->data['listar1'] = $this->representantes->listar1();
        $this->data['listar2'] = $this->representantes->listar2();
		$this->data['listar3'] = $this->representantes->listar3();
		$this->load->view('header', $this->data);
        $this->load->view('representantes/representantes');
		$this->load->view('footer');
	}

	public function registrar()
    {
        $this->data['titulo'] = 'Registrar';
        $this->data['action'] = 'representantes/Representantes/guardar';
        $this->data['estados'] = $this->estados->listar();
        $this->load->view('header', $this->data);
        $this->load->view('representantes/registro', $this->data);
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
        $resultado = $this->representantes->guardar($cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estatus, $estados_id, $municipios_id, $parroquias_id, $direccion);
        if($resultado){
            redirect(base_url('representantes/Representantes'));
        }else{
            $this->data['error'] = 'error';
        	$this->data['action'] = 'representantes/Representantes/guardar';
            $this->data['url']   = 'representantes/Representantes';
            $this->data['titulo'] = 'Registrar';
            $this->load->view('representantes/registro', $this->data);
        }
    }

    public function modificar($id)
    {
        $this->data['id']      = $id;
        $this->data['action'] = 'representantes/Representantes/editar';
        $this->data['titulo'] = 'Modificar';
        $this->data['representantes'] = $this->representantes->buscar($id);
        $this->data['estados'] = $this->estados->listar();
        $this->load->view('header', $this->data);
        $this->load->view('representantes/registro', $this->data);
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

        $resultado = $this->representantes->editar($id, $cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estatus, $estados_id, $municipios_id, $parroquias_id, $direccion);
        if($resultado){
            redirect(base_url('representantes/Representantes'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
            $this->data['action'] = 'representantes/Representantes/guardar';
            $this->data['url']   = 'representantes/Representantes';
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
        $this->data['representantes'] = $this->representantes->busca($this->buscar);

        $this->data['titulo'] = 'Busqueda de Representante';
        $this->load->view('header', $this->data);
        $this->load->view('representantes/buscar');
        $this->load->view('footer');
    }
}
