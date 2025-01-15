<?php

  class Nivel extends DB
  {

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_nivel_select_all();");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelIdPeriodoTutor($idperiodo, $iddocente)
    {
      $db = new DB();
      
      $prepare = $db->prepare("call sp_nivel_select_idperiodo_tutor(:idperiodo, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelIdDocente($params)
    {
      $db = new DB();
      
      $prepare = $db->prepare("call sp_nivel_virtual_select_iddocente(:idperiodo, :iddocente, :idcarrera);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelCarreraSeccionModalidad($params)
    {
      $db = new DB();
      
      $prepare = $db->prepare("call sp_nivel_carrera_seccion_modalidad(:idperiodo, :idcarrera, :idseccion, :modalidad);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

  }

?>