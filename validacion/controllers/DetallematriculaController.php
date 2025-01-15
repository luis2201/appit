<?php 

  class DetallematriculaController
  {

    public function insert()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idmatricula = Main::limpiar_cadena($data->idmatricula);
      //$idmatricula = Main::decryption($idmatricula);
      $idmateria = Main::limpiar_cadena($data->idmateria);
      //$idmateria = Main::decryption($idmateria);

      $detalles = new Detallematricula();
      $detalles->idmatricula = $idmatricula;
      $detalles->idmateria   = $idmateria;

      $detalles->insert();

      echo json_encode($detalles);

    }

  }

?>