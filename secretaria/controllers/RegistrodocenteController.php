<?php

  class RegistrodocenteController
  {

    public function index()
    {
      view('registrodocente.index', []);
    }

    public function findnumerodocumento($numerodocumento)
    {
      $numerodocumento = Main::limpiar_cadena($numerodocumento);

      $resp = Docente::findNumeroDocumento($numerodocumento);
      
      echo json_encode($resp);
    }

    public function insertdocente()
    {
      $tipodocumento = Main::limpiar_cadena($_POST['tipodocumento']);
      $numerodocumento = Main::limpiar_cadena($_POST['numerodocumento']);
      $apellido1 = Main::limpiar_cadena($_POST['apellido1']);
      $apellido2 = Main::limpiar_cadena($_POST['apellido2']);
      $nombre1 = Main::limpiar_cadena($_POST['nombre1']);
      $nombre2 = Main::limpiar_cadena($_POST['nombre2']);
      $contrasena = Main::encryption($numerodocumento);

      $docentes = new Docente();
      $docentes->tipodocumento = $tipodocumento;
      $docentes->numerodocumento = $numerodocumento;
      $docentes->apellido1 = $apellido1;
      $docentes->apellido2 = $apellido2;
      $docentes->nombre1 = $nombre1;
      $docentes->nombre2 = $nombre2;
      $docentes->contrasena = $contrasena;

      $res = $docentes->insertDocente();

      echo json_encode($res);
    }

    public function deletedocente($iddocente)
    {
      $iddocente = Main::limpiar_cadena($iddocente);
      $iddocente = Main::decryption($iddocente);

      $resp = Docente::deleteDocente($iddocente);
      
      echo json_encode($resp);
    }

  }

?>