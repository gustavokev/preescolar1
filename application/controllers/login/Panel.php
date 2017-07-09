<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->sesion();
	}

	public function index()
	{
		echo "Hola usuario: ". $this->session->userdata('usuario');
	}

	public function sesion()
	{
		if (!$this->session->userdata('usuario'))
		{
			redirect(base_url('login/Usuarios'));
		}
		else
		{
			$this->data['titulo'] = 'Sesión Iniciada';
			$this->load->view('header', $this->data);
			$this->load->view('login/sesion');
			$this->load->view('footer', $this->data);
		}
	}

}
