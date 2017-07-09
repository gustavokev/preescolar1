<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Register_model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
    }
 
    public function verifica_username($username) {
        $this->db->where('username',$username);
        $consulta = $this->db->get('users');
		if($consulta->num_rows() == 1)
		{
	        $row = $consulta->row();
	        return $row->username;
		}
    }
 
    public function verifica_email($email) {
    	$this->db->where('email',$email);
        $consulta = $this->db->get('users');
		if($consulta->num_rows() == 1)
		{
	        $row = $consulta->row();
	        return $row->email;
		}
    }
 
    public function nuevo_usuario($nombre, $apellidos, $email, $username, $password) {
        $data = array(
            'name' => $nombre,
            'lastname' => $apellidos,
            'username' => $username,
            'password' => $password,
            'email' => $email
        );
        return $this->db->insert('users', $data);
    }
}
/*final del modelo */