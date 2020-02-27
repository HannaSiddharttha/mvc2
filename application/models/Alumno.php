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

  public function insertar(){
    $this->load->helper("url");
    $data = array('nombre'=>$this->input->post("nombre"),
    'matricula'=>$this->input->post("matricula"),
    'apellidos'=>$this->input->post("apellidos"));
  
    return $this->db->insert("alumnos",$data);
  }

  public function actualizar($id=null){
    $data = ['nombre'=>$this->input->post("nombre"),
    'matricula'=>$this->input->post("matricula"),
    'apellidos'=>$this->input->post("apellidos")];
    $this->db->where("id",$this->input->post("id"));
    return $this->db->update("alumnos",$data);
  }

  public function eliminar($id = null){

    $this->db->where("id",$id);
    $this->db->delete("alumnos");

  }




}



 ?>
