<?php

  class Carrera extends DB
  {

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_carrera_select_all();");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraDocente($idperiodo, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_carrera_docente_ID(:idperiodo, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraDocenteTutor($idperiodo, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_carrera_docente_tutor(:idperiodo, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

  }

?>