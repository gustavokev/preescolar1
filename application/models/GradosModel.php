<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GradosModel extends CI_Model
{

    private $tabla = 'grados';

    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->select('g.id, g.grado, ae.anio');
        $this->db->from($this->tabla.' AS g');
        $this->db->join('anios_grados AS ag', 'ag.grados_id=g.id', 'inner');
        $this->db->join('anio_escolar As ae', 'ag.anios_id=ae.id', 'inner');
        $query = $this->db->get();

        return $query->result();
    }

    public function guardar($grado, $anios_id)
    {
        $this->db->select('g.id, g.grado, ag.anios_id, ae.anio');
        $this->db->from($this->tabla.' AS g');
        $this->db->join('anios_grados AS ag', 'ag.grados_id=g.id', 'inner');
        $this->db->join('anio_escolar As ae', 'ag.anios_id=ae.id', 'inner');
        $query = $this->db->get();
        if($query->num_rows()> 0){
            return FALSE;
        }
        $data = array(
            'grado' => $grado,
            'anios_id' => $anios_id
            );
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('g.id, g.grado, ag.anios_id, ae.anio');
        $this->db->from($this->tabla.' AS g');
        $this->db->join('anios_grados AS ag', 'ag.grados_id=g.id', 'inner');
        $this->db->join('anio_escolar As ae', 'ag.anios_id=ae.id', 'inner');
        $query = $this->db->get();
        return $query->row();
    }

    public function editar($id, $grado)
    {

        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('grado', $grado);
        $query = $this->db->get($this->tabla);
        if ($query->num_rows() > 0) {
            return FALSE;
        }
        $data = array(
            'grado' => $grado
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
