<?php
defined("BASEPATH") or die("Accesso prohibido");

class Estados extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EstadosModel', 'estados');
		$this->load->model("MunicipiosModel", 'municipios');
		$this->load->model("ParroquiasModel", 'parroquias');
	}

	public function index()
	{
		$this->load->helper(array('dateformat'));
		$this->data['titulo'] = 'Estados';
		$this->data['listar'] = $this->estados->listar();
		$this->load->view('header', $this->data);
        $this->load->view('estados/estados');
		$this->load->view('footer');
	}

	public function registrar()
    {	
        $this->data['titulo'] = 'Registrar';
        $this->data['action'] = 'estados/Estados/guardar';
        $this->data['estados'] = $this->estados->listar();
        $this->load->view('header', $this->data);
        $this->load->view('estados/registro', $this->data);
		$this->load->view('footer');
    }

    public function guardar()
    {
        $estado = $this->input->post('estado');
        $resultado = $this->estados->guardar($estado);
        if($resultado){
            redirect(base_url('estados/Estados'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
        	$this->data['action'] = 'estados/Estados/guardar';
            $this->data['url']   = 'estados/Estados';
            $this->data['titulo'] = 'Registro';
            $this->load->view('estados/registro', $this->data);
        }
    }

    public function modificar($id)
    {
        $this->data['id']      = $id;
        $this->data['action'] = 'estados/Estados/editar';
        $this->data['titulo'] = 'Modificar';
        $this->data['estados'] = $this->estados->buscar($id);
        $this->load->view('header', $this->data);
        $this->load->view('estados/registro', $this->data);
		$this->load->view('footer'); 
    }

    public function editar()
    {
        $id = $this->input->post('id');
        $estado = $this->input->post('estado');
        $resultado = $this->estados->editar($id, $estado);
        if($resultado){
            redirect(base_url('estados/Estados'));
        }else{
            $this->data['metodo'] = 'guardar';
            $this->data['error'] = 'error';
            $this->data['action'] = 'estados/Estados/guardar';
            $this->data['url']   = 'estados/Estados';
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