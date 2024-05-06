<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mDatos extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function consulta_yodos()
    {
        $sql="select * from alumno";
        $query=$this->db->query($sql);
        return $query;
    }

    function consulta_uno($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("alumno");;
    }
}