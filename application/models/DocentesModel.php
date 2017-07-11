<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DocentesModel extends CI_Model {

    private $tabla = 'datos';

    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->select('d.id,
        d.cedula, d.nombre_re, d.apellido_re, d.telefono, d.celular, d.email, d.direccion, e.estado, m.municipio, p.parroquia');
        $this->db->from($this->tabla.' AS d');
        $this->db->join('estados AS e', 'e.id=d.estados_id', 'inner');
        $this->db->join('municipios AS m', 'm.id=d.municipios_id', 'inner');
        $this->db->join('parroquias AS p', 'p.id=d.parroquias_id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

        public function guardar($cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estados_id, $municipios_id, $parroquias_id, $direccion)
    {
        $data = array(
            'cedula' => $cedula,
            'nombre_re' => $nombre_re,
            'apellido_re' => $apellido_re,
            'telefono' => $telefono,
            'celular' => $celular,
            'email' => $email,
            'estados_id' => $estados_id,
            'municipios_id' => $municipios_id,
            'parroquias_id' => $parroquias_id,
            'direccion' => $direccion
            );
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('d.id, d.cedula, d.nombre_re, d.apellido_re, d.telefono, d.celular, d.email, d.estados_id, d.municipios_id, d.parroquias_id, d.direccion, e.estado, m.municipio, p.parroquia');
        $this->db->from($this->tabla.' AS d');
        $this->db->join('estados AS e', 'e.id=d.estados_id', 'inner');
        $this->db->join('municipios AS m', 'm.id=d.municipios_id', 'inner');
        $this->db->join('parroquias AS p', 'p.id=d.parroquias_id', 'inner');
        $this->db->where('d.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function editar($id, $cedula, $nombre_re, $apellido_re, $telefono, $celular, $email, $estados_id, $municipios_id, $parroquias_id, $direccion)
    {
        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('cedula', $cedula);
        $query = $this->db->get($this->tabla);
        if($query->num_rows() > 0){
            return FALSE;
        }
        $data = array(
            'cedula' => $cedula,
            'nombre_re' => $nombre_re,
            'apellido_re' => $apellido_re,
            'telefono' => $telefono,
            'celular' => $celular,
            'email' => $email,
            'estados_id' => $estados_id,
            'municipios_id' => $municipios_id,
            'parroquias_id' => $parroquias_id,
            'direccion' => $direccion
            );
        $this->db->where('id', $id);
        $resultado = $this->db->update($this->tabla, $data);
        // echo $this->db->last_query();
        // exit;
        return $resultado;
    }

    public function eliminar($id)
    {
        return $this->db->delete($this->tabla, array('id' => $id));
    }

    public function busca($bus)
    {
        $this->db->like('apellido_re', $bus, 'after');
        $query = $this->db->get($this->tabla);
        return $query->result();
    }
}
