<?php

class Alumnos extends CI_Controller{

//  HOLA K HACE 

  function __construct() {
      parent::__construct();
      $this->load->helper('form');
      $this->load->helper('url');
  }

//muestra todos los elementos
  public function index(){

      $this->load->model("Alumno");
      $data["datos"] = $this->Alumno->get_alumno();

      $this->load->view("Alumno/index",$data);


  }

  public function insert() {
      $this->load->view("Alumno/insert");
  }

  public function insert2() {
    $nombre = $this->input->post('nombre');
    $matricula = $this->input->post('matricula');

    $data = array(
      'nombre'=>$nombre,
      'matricula'=>$matricula
    );

  $this->db->insert('alumnos', $data);

  //return $this->index();
  redirect(base_url()."alumnos");
  }

//muestra un elemento en espe
  public function view( $id = null ) {
    if ($id != null) {

      $this->load->model("Alumno");
      $data["dato"] = $this->Alumno->getalumno($id);
      $this->load->view("Alumno/view",$data);
    }
  }

  public function edit( $id = null ) {
    if ($id != null) {

      $this->load->model("Alumno");
      $data["dato"] = $this->Alumno->getalumno($id);
      $this->load->view("Alumno/edit",$data);
    }
  }

//metodo para actualizar
  public function update( $id = null ){

    $id = $this->input->post('id');
    $nombre = $this->input->post('nombre');
    $matricula = $this->input->post('matricula');

    $data = array(
      'nombre'=>$nombre,
      'matricula'=>$matricula
    );

    $this->db->update('alumnos', $data, array('id' => $id));
    redirect(base_url()."alumnos");
  }

  //metodo para Eliminar
  public function delete( $id = null ){

    if($id != null){

      $this->load->helper("url");
      $this->load->model("Alumno");
      $this->Alumno->eliminar($id);
      redirect(base_url()."alumnos");

    }

  }


}



 ?>
