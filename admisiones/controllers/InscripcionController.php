<?php

  class InscripcionController
  {

    public function index()
    {
        $periodos = Periodo::findAll();
        $carreras = Carrera::findAll();

        view('inscripcion.index', ["periodos" => $periodos, "carreras" => $carreras]);
    }

    public function find()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idadmisiones = Main::limpiar_cadena($data->idadmisiones);
      $idadmisiones = Main::decryption($idadmisiones);
      $idperiodo    = Main::limpiar_cadena($data->idperiodo);
      $idperiodo    = Main::decryption($idperiodo);

      $params = [":idadmisiones" => $idadmisiones, ":idperiodo" => $idperiodo];
      $resp = Inscripcion::find($params);

      echo json_encode($resp);
    }

    public function insert()
    {
      $idadmisiones = Main::limpiar_cadena($_POST['idadmisiones']);
      $idadmisiones = Main::decryption($idadmisiones);
      $idperiodo    = main::limpiar_cadena($_POST['idperiodo']);
      $idperiodo    = Main::decryption($idperiodo);
      $idcarrera    = main::limpiar_cadena($_POST['idcarrera']);
      $idcarrera    = Main::decryption($idcarrera);

      $inscripcion = new Inscripcion();
      $inscripcion->idadmisiones = $idadmisiones;
      $inscripcion->idperiodo    = $idperiodo;
      $inscripcion->idcarrera    = $idcarrera;
      $inscripcion->modalidad = "Virtual";

      $inscripcion->insert();

      echo json_encode($inscripcion);
    }

  }

?>