<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class UsuariosModel extends CI_Model
 {
 	
 	public function __construct()
 	{
 		parent::__construct();
 	}

 	public function ver()
 	{
 		$query = $this->db->get('usuarios');
 		return $query->result();
 	}

 	public function verificar($variable,$campo)
 	{
 		$consulta = $this->db->get_where('usuarios', array($campo => $variable));

 		if ($consulta->num_rows() == 1)
 		{
 			return true;
 		}
 		else
 		{
 			return false;
 		}
 	}

 	public function registrar_usuario()
 	{
 		$this->db->insert('usuarios', array('nombre' => $this->input->post('nombre',TRUE),
 											'correo' => $this->input->post('correo',TRUE),
 											'usuario' => $this->input->post('usuario',TRUE),
 											'pass' => $this->input->post('pass',TRUE),
 											'codigo' => '123456',
 											'estado' => '0'));
 	}

 	public function sesion()
 	{
 		$consulta = $this->db->get_where('usuarios', array('usuario' => $this->input->post('usuario',TRUE),
 															'pass' => $this->input->post('pass',TRUE)));
 		if ($consulta->num_rows() == 1)
 		{
 			return true;
 		}
 		else
 		{
 			return false;
 		}
 	}
 }