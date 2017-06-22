<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AlumnosModel extends CI_Model {

    private $tabla = 'alumnos';

    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->select('al.id, al.nombre_al, al.apellido_al, al.fecha_nac, al.sexo, al.estados_id, al.municipios_id, gsa.grado_id, gsa.seccion_id, gsa.anio_id, g.grado, s.seccion, ae.anio, e.estado, m.municipio');
        $this->db->from($this->tabla.' AS al');
        $this->db->join('grado_seccion_anio AS gsa', 'al.gsa_id=gsa.id', 'inner');
        $this->db->join('grados AS g', 'gsa.grado_id=g.id', 'inner');
        $this->db->join('secciones AS s', 'gsa.seccion_id=s.id', 'inner');
        $this->db->join('anio_escolar AS ae', 'gsa.anio_id=ae.id', 'inner');
        $this->db->join('estados AS e', 'e.id=al.estados_id', 'inner');
        $this->db->join('municipios AS m', 'm.id=al.municipios_id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    public function guardar($nombre_al, $apellido_al, $fecha_nac, $sexo, $estados_id, $municipios_id)
    {
        $this->db->select('id');
        $this->db->where('nombre_al', $nombre_al);
        $query = $this->db->get($this->tabla);
        if($query->num_rows()> 0){
            return FALSE;
        }
        $data = array(
            'nombre_al' => $nombre_al,
            'apellido_al' => $apellido_al,
            'fecha_nac' => $fecha_nac,
            'sexo' => $sexo,
            'estados_id' => $estados_id,
            'municipios_id' => $municipios_id
            );
        return $this->db->insert($this->tabla, $data);
    }

    public function buscar($id)
    {
        $this->db->select('al.id, al.nombre_al, al.apellido_al, al.fecha_nac, al.sexo, al.estados_id, al.municipios_id, gsa.grado_id, gsa.seccion_id, gsa.anio_id, g.grado, s.seccion, ae.anio, ad.cedula_escolar, d.cedula, d.nombre_re, d.apellido_re, e.estado, m.municipio');
        $this->db->from($this->tabla.' AS al');
        $this->db->join('grado_seccion_anio AS gsa', 'al.gsa_id=gsa.id', 'inner');
        $this->db->join('grados AS g', 'gsa.grado_id=g.id', 'inner');
        $this->db->join('secciones AS s', 'gsa.seccion_id=s.id', 'inner');
        $this->db->join('anio_escolar AS ae', 'gsa.anio_id=ae.id', 'inner');
        $this->db->join('alumnos_datos AS ad', 'al.id=ad.alumnos_id', 'inner');
        $this->db->join('datos AS d', 'ad.datos_id=d.id', 'inner');
        $this->db->join('estados AS e', 'e.id=al.estados_id', 'inner');
        $this->db->join('municipios AS m', 'm.id=al.municipios_id', 'inner');
        $this->db->where('al.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function editar($id, $nombre_al, $apellido_al, $fecha_nac, $sexo, $estados_id, $municipios_id)
    {

        $this->db->select('id');
        $this->db->where('id!=', $id);
        $this->db->where('nombre_al', $nombre_al);
        $query = $this->db->get($this->tabla);
        if($query->num_rows() > 0){
            return FALSE;
        }
        $data = array(
            'nombre_al' => $nombre_al,
            'apellido_al' => $apellido_al,
            'fecha_nac' => $fecha_nac,
            'sexo' => $sexo,
            'estados_id' => $estados_id,
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
}
