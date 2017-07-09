<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InicioModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function listar()
    {
        $query = $this->db->get('alumnos');
        return $query->result();
    }
}