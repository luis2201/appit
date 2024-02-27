<?php

  class ListasnivelesController
  {

    public function index()
    {      
      $carreras = Carrera::findAll();
      
      view('listasniveles.index', ["carreras" => $carreras]);
    }

    public function viewlista()
    {
      $data = json_decode(file_get_contents('php://input'));
      
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);
      $idseccion = Main::limpiar_cadena($data->idseccion);
      $modalidad = Main::limpiar_cadena($data->modalidad);
      $idnivel = Main::limpiar_cadena($data->idnivel);

      $idperiodo = Main::decryption($idperiodo);
      $idcarrera = Main::decryption($idcarrera);

      $res = Listasniveles::viewLista($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel);
      
      echo json_encode($res);
    }
  
  }

?>