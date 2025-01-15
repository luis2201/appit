<?php

  class Docente extends DB
  {

    public static function findDocenteCarreraCurso($idperiodo, $idcarrera, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_carrera_curso(:idperiodo, :idcarrera, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function findDocenteCarreraMateria($idperiodo, $idcarrera, $idnivel, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_carrera_materia(:idperiodo, :idcarrera, :idnivel, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function validateTutor($idperiodo, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_tutor(:idperiodo, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

  }

?>