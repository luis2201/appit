<?php
  
  class Solicitudmatricula extends DB
  {

    public static function findall($idperiodo)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_matricula_select_idperiodo(:idperiodo)");
      $prepare->execute(["idperiodo" => $idperiodo]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudmatricula::class);
    }

    public static function findcedula($numero_identificacion)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_estudiante_select_identificacion(:numero_identificacion)");
      $prepare->execute(["numero_identificacion" => $numero_identificacion]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudmatricula::class);
    }

    public static function findCedulaNombres($numero_identificacion)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_estudiante_select_identificacion_nombres(:numero_identificacion)");
      $prepare->execute(["numero_identificacion" => $numero_identificacion]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudmatricula::class);
    }

    public static function inconsistenciaDatos($numero_identificacion)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_estudiante_cambio_estado(:numero_identificacion)");
      $prepare->execute(["numero_identificacion" => $numero_identificacion]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudmatricula::class);
    }

    public static function rechazarMatricula($idmatricula)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_matricula_delete(:idmatricula)");
      $prepare->execute(["idmatricula" => $idmatricula]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudmatricula::class);
    }    

  }
  
?>