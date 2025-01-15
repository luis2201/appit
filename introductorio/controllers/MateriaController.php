<?php

  class MateriaController
  {

    public function find()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idperiodo = Main::decryption($idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);
      $idcarrera = Main::decryption($idcarrera);

      $resp = Materia::findAll($idperiodo, $idcarrera);

      echo json_encode($resp);
    }

    public function finddetallematricula()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idmatricula = Main::limpiar_cadena($data->idmatricula);
      $idmatricula = Main::decryption($idmatricula);
      $idmateria = Main::limpiar_cadena($data->idmateria);
      // $idmateria = Main::decryption($idmateria);

      $resp = Materia::finddetallematricula($idmatricula, $idmateria);

      echo json_encode($resp);
    }

  }

?>