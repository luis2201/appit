<?php

  class Estudiante extends DB
  {

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_estudiante;");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Pagomatricula::class);
    }

    public static function findestudianteId($idestudiante)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_estudiante WHERE idestudiante = :idestudiante;");
      $prepare->execute([":idestudiante" => $idestudiante]);

      return $prepare->fetchObject(Estudiante::class);
    }

  }

?>