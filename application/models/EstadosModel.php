<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EstadosModel extends CI_Model {

    private $tabla = 'estados';

    public function __construct()
    {
        parent::__construct();
    }
    public function listar()
    {
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

        public function guardar($estado)
    {
        $this->db->select('id');
        $this->db->where('estado', $estado);
        $query = $this->db->get($this->tabla);
        if($query->num_rows()> 0){
            return FALSE;
        }
        $data = array(
            'estado' => $estado
            );
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('estado');
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabla);
        return $query->row();
    }

    public function editar($id, $estado)
    {

        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('estado', $estado);
        $query = $this->db->get($this->tabla);
        if($query->num_rows() > 0){
            return FALSE;
        }
        $data = array(
            'estado' => $estado
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


    public function getEstados()
    {
        $this->db->select("id,estado");
        $estados = $this->db->get("estados");
        $data = array();
        foreach($estados->result() as $estado){
            $data[$estado->id] = $estado->estado;
        }
        return $data;
    }

}
