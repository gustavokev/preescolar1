<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('UsuariosModel','umo');
	}

	public function index()
	{
		$this->data['titulo'] = 'Login';
		$this->load->view('header', $this->data);
		$this->load->view('login/usuarios');
		$this->load->view('footer', $this->data);
	}

	public function registro()
	{
		$this->data['titulo'] = 'Registro';
		$this->load->view('header', $this->data);
		$this->load->view('login/registro_usuario');
		$this->load->view('footer', $this->data);
	}

	public function registrar()
	{
		if ($this->input->post('submit_reg'))
		{
			$this->form_validation->set_rules('nombre','Nombre','required');
			$this->form_validation->set_rules('correo','Correo','required|trim|valid_email|callback_verificar_correo');
			$this->form_validation->set_rules('usuario','Usuario','required|trim|callback_verificar_usuario');
			$this->form_validation->set_rules('pass','Contraseña','required|trim|min_length[6]');
			$this->form_validation->set_rules('pass2','Confirme Contraseña','required|trim|matches[pass]');

			$this->form_validation->set_message('required','El Campo %s Es Obligatorio');
			$this->form_validation->set_message('valid_email','%s No Válido');
			$this->form_validation->set_message('min_length','La %s debe tener como mínimo 6 carácteres');
			$this->form_validation->set_message('matches','Debe coincidir la Contraseña');
			$this->form_validation->set_message('verificar_usuario','El %s Ya Existe');
			$this->form_validation->set_message('verificar_correo','El %s Ya Existe');

			if ($this->form_validation->run() != FALSE)
			{
				$this->umo->registrar_usuario();
				$data = array('mensaje' => 'El Usuario se registró correctamente');
				$this->load->view('login/registro_usuario' ,$data);
			}
			else
			{
				$this->data['titulo'] = 'Registro';
				$this->load->view('header', $this->data);
				$this->load->view('login/registro_usuario');
				$this->load->view('footer', $this->data);
			}
		}
	}

	public function verificar_usuario($usuario)
	{
		$variable = $this->umo->verificar($usuario, 'usuario');
		if ($variable == true)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function verificar_correo($correo)
	{
		$variable = $this->umo->verificar($correo, 'correo');
		if ($variable == true)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function sesion()
	{
		if ($this->input->post('submit'))
		{
			$variable = $this->umo->sesion();
			if ($variable == true)
			{
				$variables = array('usuario' => $this->input->post('usuario'));
				$this->session->set_userdata($variables);
				redirect(base_url('login/Panel'));
			}
			else
			{
				$this->data = array('mensaje' => 'El Usuario/Contraseña son Incorrectos');
				$this->data['titulo'] = 'Inicio de Sesión';
				$this->load->view('header', $this->data);
				$this->load->view('login/usuarios', $this->data);
				$this->load->view('footer', $this->data);
			}
		}
		else
		{
			redirect(base_url('login/Usuarios'));
		}
	}
}
