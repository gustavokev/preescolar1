<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AnioModel extends CI_Model {

    private $tabla = 'anio_escolar';

    public function __construct()
    {
        parent::__construct();
    }
    public function listar()
    {
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

        public function guardar($anio)
    {
        $this->db->select('id');
        $this->db->where('anio', $anio);
        $query = $this->db->get($this->tabla);
        if($query->num_rows()> 0){
            return FALSE;
        }
        $data = array(
            'anio' => $anio
            );
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('anio');
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabla);
        return $query->row();
    }

    public function editar($id, $anio)
    {

        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('anio', $anio);
        $query = $this->db->get($this->tabla);
        if($query->num_rows() > 0){
            return FALSE;
        }
        $data = array(
            'anio' => $anio
            );
        $this->db->where('id', $id);
        $resultado = $this->db->update($this->tabla, $data);
        /*echo $this->db->last_query();
        exit;*/
        return $resultado;
    }

    public function eliminar($id)
    {
        return $this->db->delete($this->tabla, array('id' => $id));
    }
}
