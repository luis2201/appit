<?php

  class Seccion extends DB
  {

    public static function findAll()
    {
      $db = new DB();

      $prepare = $db->prepare("call sp_seccion_select_all();");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Seccion::class);
    }

    public static function findSeccionIdPeriodo($idperiodo)
    {
      $db = new DB();

      $prepare = $db->prepare("call sp_seccion_select_idperiodo(:idperiodo);");
      $prepare->execute([":idperiodo" => $idperiodo]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Seccion::class);
    }

    public static function findSeccionIdPeriodoTutor($idperiodo, $iddocente, $idcarrera, $idnivel)
    {
      $db = new DB();

      $prepare = $db->prepare("call sp_seccion_select_idperiodo_tutor(:idperiodo, :iddocente, :idcarrera, :idnivel);");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Seccion::class);
    }

  }

?>