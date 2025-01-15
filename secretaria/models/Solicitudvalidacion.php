<?php
  
  class Solicitudvalidacion extends DB
  {

    public static function findall()
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_validacion_select_all()");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudvalidacion::class);
    }

    public static function findcedula($numero_identificacion)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_estudiante_select_identificacion(:numero_identificacion)");
      $prepare->execute(["numero_identificacion" => $numero_identificacion]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudvalidacion::class);
    }

    public static function inconsistenciaDatos($numero_identificacion)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_estudiante_cambio_estado(:numero_identificacion)");
      $prepare->execute(["numero_identificacion" => $numero_identificacion]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudvalidacion::class);
    }

    public static function rechazarMatricula($idmatricula)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_matricula_delete(:idmatricula)");
      $prepare->execute(["idmatricula" => $idmatricula]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudvalidacion::class);
    }    

  }
  
?>