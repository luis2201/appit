<?php

  class HistorialmatriculaController
  {

    public function index()
    {
      view('historialmatricula.index', []);
    }

    public function getmateriasidperiodo()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idperiodo = Main::decryption($idperiodo);

      $idestudiante = Main::limpiar_cadena($data->idestudiante);
      $idestudiante = Main::decryption($idestudiante);

      $resp = Historialmatricula::getMateriasIdPeriodo($idestudiante, $idperiodo);

      echo json_encode($resp);
    }

  }

?>