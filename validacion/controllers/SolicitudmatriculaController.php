<?php

  class SolicitudmatriculaController
  {

    public function index()
    {
      view('solicitudmatricula.index', []);
    }

    public function find()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idestudiante = Main::limpiar_cadena($data->idestudiante);
      $idestudiante = Main::decryption($idestudiante);
      $idperiodo    = Main::limpiar_cadena($data->idperiodo);
      //$idperiodo    = Main::decryption($idperiodo);

      $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo];
      $resp = Solicitudmatricula::find($params);

      echo json_encode($resp);
    }

    public function findmatriculaidestudiante($idestudiante)
    {
      $idestudiante = Main::limpiar_cadena($idestudiante);
      $idestudiante = Main::decryption($idestudiante);

      $params = [":idestudiante" => $idestudiante];
      $resp = Solicitudmatricula::findMatriculaIdEstudiante($params);

      echo json_encode($resp);
    }

    public function insert()
    {
      $idestudiante = Main::limpiar_cadena($_POST['idestudiante']);
      $idestudiante = Main::decryption($idestudiante);
      $idperiodo    = main::limpiar_cadena($_POST['idperiodo']);
      $idperiodo    = Main::decryption($idperiodo);
      $idnivel      = main::limpiar_cadena($_POST['idnivel']);
      $idnivel      = Main::decryption($idnivel);
      $idcarrera    = main::limpiar_cadena($_POST['idcarrera']);
      $idcarrera    = Main::decryption($idcarrera);
      $idseccion    = main::limpiar_cadena($_POST['idseccion']);
      $idseccion    = Main::decryption($idseccion);
      $modalidad    = main::limpiar_cadena($_POST['modalidad']);

      $solicitud = new Solicitudmatricula();
      $solicitud->idestudiante = $idestudiante;
      $solicitud->idperiodo    = $idperiodo;
      $solicitud->idnivel      = $idnivel;
      $solicitud->idcarrera    = $idcarrera;
      $solicitud->idseccion    = $idseccion;
      $solicitud->modalidad    = $modalidad;

      $solicitud->insert();

      echo json_encode($solicitud);
    }

  }

?>