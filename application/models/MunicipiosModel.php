<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MunicipiosModel extends CI_Model {

    private $tabla = 'municipios';

    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->select('mu.id, mu.municipio, es.estado');
        $this->db->from($this->tabla.' AS mu');
        $this->db->join('estados As es', 'mu.estados_id=es.id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchMunEst($estados_id)
    {
        $this->db->select("id,municipio");
        $this->db->where("estados_id", $estados_id);
        return $this->db->get("municipios")->result();
    }

    public function guardar($estados_id, $municipio)
    {
        $data = array(
            'estados_id' => $estados_id,
            'municipio' => $municipio
            );
        // print_r($data); exit;
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('municipio');
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabla);
        return $query->row();
    }

    public function editar($id, $municipio)
    {

        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('municipio', $municipio);
        $query = $this->db->get($this->tabla);
        if($query->num_rows() > 0){
            return FALSE;
        }
        $data = array(
            'municipio' => $municipio
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
