<?php

  class CarreraController
  {
    
    public function index()
    {
      view('carrera.index', []);
    }

    public function findcarrera()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idestudiante = Main::limpiar_cadena($data->idestudiante);
      $idestudiante = Main::decryption($idestudiante);
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      //$idperiodo = Main::decryption($idperiodo);

      $resp = Carrera::findCarrera($idestudiante, $idperiodo);

      $carreras  = new Carrera();
      $carreras->idmatricula = $resp->idmatricula; 
      $carreras->idcarrera = $resp->idcarrera;

      echo json_encode($carreras);
    }

  }
  

?>