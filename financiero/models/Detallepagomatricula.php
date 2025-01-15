<?php

  class Detallepagomatricula extends DB
  {

    public static function finddetalleIdPago($idpago_matricula)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_detalle_pagomatricula WHERE idpago_matricula = :idpago_matricula");
      $prepare->execute([":idpago_matricula" => $idpago_matricula]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Detallepagomatricula::class);
    }

  }

?>