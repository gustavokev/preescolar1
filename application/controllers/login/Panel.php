<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->sesion();
		$this->load->model('UsuariosModel','umo');
	}

	public function index()
	{
		$ver = $this->umo->ver();
		$this->twig->display('login/sesion', compact('titulo', 'ver'));
		echo "<h4>"."--"." Hola usuario: ". $this->session->userdata('usuario')."--</h4>";
	}

	public function sesion()
	{
		if (!$this->session->userdata('usuario'))
		{
			redirect(base_url('login/Usuarios'));
		}
		else
		{
			$titulo = 'Sesión Iniciada';
			$this->twig->display('login/sesion', compact('titulo'));
		}
	}

}
