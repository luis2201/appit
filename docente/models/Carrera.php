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

    public static function findAllIdPeriodo($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                              FROM tb_malla M
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                              WHERE M.idperiodo = :idperiodo
                              GROUP BY C.idcarrera");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findAllIdPeriodoIdDocente($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                              FROM tb_carga_horaria R
                                INNER JOIN tb_detalle_cargahoraria D ON R.idcarga_horaria = D.idcarga_horaria
                                INNER JOIN tb_carrera C ON D.idcarrera = C.idcarrera
                              WHERE R.idperiodo = :idperiodo
                              AND R.iddocente = :iddocente
                              AND (C.idcarrera = 4 OR C.idcarrera = 37 OR C.idcarrera = 38 OR C.idcarrera = 48)
                              GROUP BY C.idcarrera");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findAllValidacion($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                              FROM tb_matricula M 
                                INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                              WHERE M.idperiodo = :idperiodo
                              AND E.validacion = 1
                              GROUP BY C.idcarrera");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraDocente($idperiodo, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_carrera_docente_ID(:idperiodo, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraDocentePresencial($idperiodo, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_carrera_docente_presencial(:idperiodo, :iddocente);");
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

    public static function findCarreraEnLineaDocenteTutor($idperiodo, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                              FROM tb_tutor T 
                                INNER JOIN tb_carrera C ON T.idcarrera = C.idcarrera
                                  INNER JOIN tb_carga_horaria R ON T.iddocente = R.iddocente
                                  INNER JOIN tb_detalle_cargahoraria D ON R.idcarga_horaria = D.idcarga_horaria
                              WHERE T.idperiodo = :idperiodo
                              AND T.iddocente = :iddocente
                              AND T.modalidad = 'Virtual'
                              GROUP BY C.idcarrera");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraIdDocente($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_carrera_virtual_IdDocente(:idperiodo, :iddocente);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraIdDocenteAll($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_carrera_docente_ID(:idperiodo, :iddocente);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraIntroductorio($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_carrera_introductorio_select_idperiodo(:idperiodo, :iddocente);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

  }

?>