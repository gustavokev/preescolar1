<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('AlumnosModel', 'alumnos');
        $this->load->model('DocentesModel', 'datos');
        $this->load->model('RepresentantesModel', 'datos');
        $this->load->model('EstadosModel', 'estados');
        $this->load->model('GradosModel', 'grados');
        $this->load->model('SeccionesModel', 'secciones');
        $this->load->model('AnioModel', 'anio');

    }

	public function index()
    {
        $this->load->helper(array('dateformat', 'mayusculas', 'mayusculas1', 'unidad'));
        $titulo = 'Alumnos';
        $listar = $this->alumnos->listar();
        $this->twig->display('alumnos/alumnos', compact('titulo', 'listar'));
    }

    public function detalles($id)
	{
        $titulo = 'Detalles';
        $alumnos = $this->alumnos->buscar($id);
        $estados = $this->estados->listar();
        $grados = $this->grados->listar();
        $secciones = $this->secciones->listar();
        $this->twig->display('alumnos/detalles', compact('titulo', 'estados', 'grados', 'secciones', 'alumnos'));
    }

	public function registrar()
    {	
        $titulo = 'Registrar';
        $action = 'alumnos/Alumnos/guardar';
        $estados = $this->estados->listar();
        $grados = $this->grados->listar();
        $secciones = $this->secciones->listar();
        $anios = $this->anio->listar();
        $this->twig->display('alumnos/registro', compact('titulo', 'action', 'estados', 'grados', 'secciones', 'anios'));
    }

    public function guardar()
    {
        // echo 'fff';
        // exit;
        $nombre_al = $this->input->post('nombre_al');
        $apellido_al = $this->input->post('apellido_al');
        $fecha_nac = $this->input->post('fecha_nac');
        $sexo = $this->input->post('sexo');
        $estados_id = $this->input->post('estados_id');
        $municipios_id = $this->input->post('municipios_id');
        $alumnos_datos_id = $this->input->post('alumnos_datos_id');
        $grado_id = $this->input->post('grado_id');
        $seccion_id = $this->input->post('seccion_id');
        $anio_id = $this->input->post('anio_id');
        $resultado = $this->alumnos->guardar($nombre_al, $apellido_al, $fecha_nac, $sexo, $estados_id, $municipios_id, $alumnos_datos_id, $grado_id, $seccion_id, $anio_id);
        if($resultado){
            redirect(base_url('alumnos/Alumnos'));
        }else{
            $error = 'error';
        	$action = 'alumnos/Alumnos/guardar';
            $url   = 'alumnos/Alumnos';
            $titulo = 'Registro';
            $this->twig->display('alumnos/registro', compact('titulo', 'action', 'url', 'error'));
        }
    }

    public function modificar($id)
    {
        $id      = $id;
        $action = 'alumnos/Alumnos/editar';
        $titulo = 'Modificar';
        $alumnos = $this->alumnos->buscar($id);
        $estados = $this->estados->listar();
        $grados = $this->grados->listar();
        $secciones = $this->secciones->listar();
        $this->twig->display('alumnos/registro', compact('titulo', 'action', 'estados', 'grados', 'secciones', 'alumnos', 'url', 'error'));
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $nombre_al = $this->input->post('nombre_al');
        $apellido_al = $this->input->post('apellido_al');
        $fecha_nac = $this->input->post('fecha_nac');
        $sexo = $this->input->post('sexo');
        $estados_id = $this->input->post('estados_id');
        $municipios_id = $this->input->post('municipios_id');
        $grado_id = $this->input->post('grado_id');
        $seccion_id = $this->input->post('seccion_id');
        $anio_id = $this->input->post('anio_id');
        $resultado = $this->alumnos->editar($id, $nombre_al, $apellido_al, $fecha_nac, $sexo, $estados_id, $municipios_id, $grado_id, $seccion_id, $anio_id);
        if($resultado){
            redirect(base_url('alumnos/Alumnos'));
        }else{
            $metodo = 'guardar';
            $error = 'error';
            $action = 'alumnos/Alumnos/guardar';
            $url   = 'alumnos/Alumnos';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->alumnos->eliminar($id);
        if($resultado){
            redirect(base_url('alumnos/Alumnos'));
        }
    }
}
