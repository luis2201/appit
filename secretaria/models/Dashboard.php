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
      $prepare = $db->prepare("SELECT idmatricula FROM tb_matricula M WHERE M.idperiodo = :idperiodo AND M.estado = 0");
      $prepare->execute([":idperiodo" => $idperiodo]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Dashboard::class);
    }

    public static function contarPendientes($idperiodo)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT count(*) FROM tb_matricula M WHERE M.idperiodo = :idperiodo AND M.estado = 0");
      $prepare->execute([":idperiodo" => $idperiodo]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Dashboard::class);
    }

    public static function datosIncompletos()
    {
      $db = new DB();
      $prepare = $db->prepare("CALL	sp_datos_estudiantes_incompletos()");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Dashboard::class);
    }

    public static function matriculadosCarrera($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT M.idmatricula
                              FROM tb_matricula M 
                                INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                              WHERE M.idperiodo = :idperiodo
                              AND M.idcarrera = :idcarrera
                              AND E.introductorio = 0
                              AND M.estado = 1");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Dashboard::class);
    }

    public static function matriculados($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT M.idmatricula AS matriculados 
                              FROM tb_matricula M
                                INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                              WHERE idperiodo = :idperiodo
                              AND E.introductorio = 0
                              AND M.estado = 1");

      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Dashboard::class);
    }

  }

?>