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

    public static function findNivelCarrera($idperiodo, $idcarrera)
    {
      $db = new DB();

      $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
      // $prepare = $db->prepare("call sp_nivel_carrera_select(:idperiodo, :idcarrera);");
      $prepare = $db->prepare("call sp_nivel_select_all();");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findNivelCarreraSeccion($idperiodo, $idcarrera, $idnivel)
    {
      $db = new DB();

      // $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel];
      // $prepare = $db->prepare("call sp_nivel_carrera_select(:idperiodo, :idcarrera);");
      $params = [":idperiodo" => $idperiodo];
      $prepare = $db->prepare("call sp_seccion_select_idperiodo(:idperiodo);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }
  }

?>