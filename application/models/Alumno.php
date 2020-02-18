<?php

class Alumno extends CI_Model {

  public function get_alumno(){

    $query = $this->db->get('alumnos',10);
    return $query->result();

  }

  public function getalumno($id = null){

    $query = $this->db->get_where("alumnos",array("id"=>$id));
    return $query->row_array();

  }

  public function eliminar($id = null){

    $this->db->where("id",$id);
    $this->db->delete("alumnos");

  }


}



 ?>
