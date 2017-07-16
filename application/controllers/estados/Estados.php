<?php
defined("BASEPATH") or die("Accesso prohibido");

class Estados extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EstadosModel', 'estados');
	}

	public function index()
	{
		$this->load->helper(array('dateformat'));
		$titulo = 'Estados';
		$listar = $this->estados->listar();
		$this->twig->display('estados/estados', compact('titulo', 'listar'));
	}

	public function registrar()
    {	
        $titulo = 'Registrar';
        $action = 'estados/Estados/guardar';
        $this->twig->display('estados/registro', compact('titulo', 'action'));
    }

    public function guardar()
    {
        $estado = $this->input->post('estado');
        $resultado = $this->estados->guardar($estado);
        if($resultado){
            redirect(base_url('estados/Estados'));
        }else{
            $error = 'error';
        	$action = 'estados/Estados/guardar';
            $url   = 'estados/Estados';
            $titulo = 'Registrar';
            $this->twig->display('estados/registro', compact('titulo', 'error', 'url', 'action'));
        }
    }

    public function modificar($id)
    {
        $id      = $id;
        $action = 'estados/Estados/editar';
        $titulo = 'Modificar Estado';
        $estados = $this->estados->buscar($id);
        $this->twig->display('estados/registro', compact('titulo', 'action', 'estados')); 
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $estado = $this->input->post('estado');
        $resultado = $this->estados->editar($id, $estado);
        if($resultado){ 
            redirect(base_url('estados/Estados'));
        }else{
            $metodo = 'guardar';
            $error = 'error';
            $action = 'estados/Estados/guardar';
            $url   = 'estados/Estados';
        }
    }

    public function eliminar($id)
    {
        $resultado = $this->estados->eliminar( $id);
        if($resultado){
            redirect(base_url('estados/estados'));
        }
    }
}