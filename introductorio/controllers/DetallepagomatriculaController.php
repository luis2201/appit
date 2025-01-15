<?php

  class DetallepagomatriculaController
  {

    public static function finddetalleidpago($idpagomatricula)
    {
      $idpago_matricula = $idpagomatricula;
      echo json_encode($idpago_matricula);
    }

  }

?>