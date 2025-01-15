<?php

  class RegisterController
  {

    public function index()
    {
      view('register.index', []);
    }

    public static function findidentificacion($numero_identificacion)
    {
      $numero_identificacion = Main::limpiar_cadena($numero_identificacion);
      $resp = Register::findidentificacion($numero_identificacion);
      
      echo json_encode($resp);
    }

    public static function findcorreo()
    {
      $data = json_decode(file_get_contents('php://input'));

      $correo_electronico = Main::limpiar_cadena($data->correo_electronico);
      $resp = Register::findcorreo($correo_electronico);
      
      echo json_encode($resp);
    }

    public function insert()
    {
      $tipo_identificacion   = Main::limpiar_cadena($_POST['tipo_identificacion']);
      $numero_identificacion = Main::limpiar_cadena($_POST['numero_identificacion']);
      $apellido1             = Main::limpiar_cadena($_POST['apellido1']);
      $apellido2             = Main::limpiar_cadena($_POST['apellido2']);
      $nombre1               = Main::limpiar_cadena($_POST['nombre1']);
      $nombre2               = Main::limpiar_cadena($_POST['nombre2']);
      $correo_electronico    = Main::limpiar_cadena($_POST['correo_electronico']);
      $contrasena            = Main::encryption($numero_identificacion);

      $registers = new Register();
      $registers->tipo_identificacion   = $tipo_identificacion;
      $registers->numero_identificacion = $numero_identificacion;
      $registers->apellido1             = $apellido1;
      $registers->apellido2             = $apellido2;
      $registers->nombre1               = $nombre1;
      $registers->nombre2               = $nombre2;
      $registers->correo_electronico    = $correo_electronico;
      $registers->contrasena            = $contrasena;

      $registers->insert();

      echo json_encode($registers);
    }

  }

?>