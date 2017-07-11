<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SectoresModel extends CI_Model {

    private $tabla = 'sectores';

    public function __construct()
    {
        parent::__construct();
    }
    public function listar()
    {
        $this->db->select('sec.id, sec.sector, pa.parroquia');
        $this->db->from($this->tabla.' AS sec');
        $this->db->join('parroquias As pa', 'sec.parroquias_id=pa.id', 'inner');
        $query = $this->db->get('');
        return $query->result();
    }

    public function searchSerPar($parroquias_id)
    {
        $this->db->select("id, sector");
        $this->db->where("parroquias_id", $parroquias_id);
        return $this->db->get("sectores")->result();
    }

        public function guardar($parroquias_id, $sector)
    {
        $data = array(
            'parroquias_id' => $parroquias_id,
            'sector' => $sector
            );
        // print_r($data); exit;
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('sector');
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabla);
        return $query->row();
    }

    public function editar($id, $sector)
    {

        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('sector', $sector);
        $query = $this->db->get($this->tabla);
        if($query->num_rows() > 0){
            return FALSE;
        }
        $data = array(
            'sector' => $sector
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


    public function getsectores()
    {
        $this->db->select("id,sector");
        $sectores = $this->db->get("sectores");
        $data = array();
        foreach($sectores->result() as $sector){
            $data[$sector->id] = $sector->sector;
        }
        return $data;
    }

}
