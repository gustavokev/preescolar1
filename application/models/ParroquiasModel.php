<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ParroquiasModel extends CI_Model {

    private $tabla = 'parroquias';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function listar()
    {
        $this->db->select('pa.id, pa.parroquia, mu.municipio');
        $this->db->from($this->tabla.' AS pa');
        $this->db->join('municipios As mu', 'pa.municipios_id=mu.id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchParMun($municipios_id)
    {
        $this->db->select("id, parroquia");
        $this->db->where("municipios_id", $municipios_id);
        return $this->db->get("parroquias")->result();
    }

        public function guardar($municipios_id, $parroquia)
    {
        $data = array(
            'municipios_id' => $municipios_id,
            'parroquia' => $parroquia
            );
        // print_r($data); exit;
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('pa.id, pa.parroquia, pa.municipios_id');
        $this->db->from($this->tabla.' AS pa');
        $this->db->join('municipios As mu', 'pa.municipios_id=mu.id', 'inner');
        $this->db->where('pa.id', $id);
        $query = $this->db->get($this->tabla);
        return $query->row();
    }

    public function editar($id, $parroquia, $municipios_id)
    {
        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('parroquia', $parroquia);
        $query = $this->db->get($this->tabla);
        if($query->num_rows() > 0){
            return FALSE;
        }
        $data = array(
            'parroquia' => $parroquia,
            'municipios_id' => $municipios_id
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


    public function getparroquias()
    {
        $this->db->select("id,parroquia");
        $parroquias = $this->db->get("parroquias");
        $data = array();
        foreach($parroquias->result() as $parroquia){
            $data[$parroquia->id] = $parroquia->parroquia;
        }
        return $data;
    }

}
