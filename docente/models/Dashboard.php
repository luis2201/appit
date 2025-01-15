<?php

  class Dashboard extends DB
  {

    public static function matriculasAprobadas($idperiodo)
    {
      $db = new DB();
      $prepare = $db->prepare("CALL sp_matricula_select_numero_aprobado(:idperiodo)");
      $prepare->execute([":idperiodo" => $idperiodo]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Dashboard::class);
    }

    public static function matriculasPorAprobar($idperiodo)
    {
      $db = new DB();
      $prepare = $db->prepare("CALL sp_matricula_select_numero_por_aprobar(:idperiodo)");
      $prepare->execute([":idperiodo" => $idperiodo]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Dashboard::class);
    }

  }

?>