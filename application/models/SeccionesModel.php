<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SeccionesModel extends CI_Model {

    private $tabla = 'secciones';

    public function __construct()
    {
        parent::__construct();
    }
    public function listar()
    {
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

        public function guardar($seccion)
    {
        $this->db->select('id');
        $this->db->where('seccion', $seccion);
        $query = $this->db->get($this->tabla);
        if($query->num_rows()> 0){
            return FALSE;
        }
        $data = array(
            'seccion' => $seccion
            );
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('seccion');
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabla);
        return $query->row();
    }

    public function editar($id, $seccion)
    {

        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('seccion', $seccion);
        $query = $this->db->get($this->tabla);
        if($query->num_rows() > 0){
            return FALSE;
        }
        $data = array(
            'seccion' => $seccion
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
