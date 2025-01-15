<?php

  class Matricula extends DB
  {

    public static function findvalormatricula($idperiodo)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_config_pagomatricula WHERE idperiodo = :idperiodo");
      $prepare->execute([":idperiodo" => $idperiodo]);

      return $prepare->fetchObject(Matricula::class);
    }

    public static function findestudiantemodalidad($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT modalidad FROM tb_matricula WHERE idestudiante = :idestudiante AND idperiodo = :idperiodo");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
    }

  }

?>