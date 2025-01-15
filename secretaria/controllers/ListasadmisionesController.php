<?php

  class ListasadmisionesController
  {

    public function index()
    {
      $periodosa = Periodo::findActivo();
      $carreras = Carrera::findAll();

      view('listasadmisiones.index', ["periodosa" => $periodosa, "carreras" => $carreras]);
    }

    public function viewlista()
    {
      $data = json_decode(file_get_contents('php://input'));
      
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);
      $modalidad = Main::limpiar_cadena($data->modalidad);

      $idperiodo = Main::decryption($idperiodo);
      $idcarrera = Main::decryption($idcarrera);

      $res = Listasadmisiones::viewLista($idperiodo, $idcarrera, $modalidad);

      echo json_encode($res);
    }
  
  }

?>