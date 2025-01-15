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

    public static function findCarreraPeriodo($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                              FROM tb_matricula M INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                              WHERE M.idperiodo = :idperiodo
                              GROUP BY M.idcarrera");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraPeriodoPresencial($params)
    {
      $db = new DB();
      // $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
      //                         FROM tb_matricula M 
      //                           INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
      //                             INNER JOIN tb_seccion S ON M.idseccion = S.idseccion
      //                         WHERE M.idperiodo = :idperiodo
      //                         AND S.seccion <> 'En línea'                              
      //                         GROUP BY M.idcarrera");

      $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                              FROM tb_matricula M 
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                              WHERE M.idperiodo = :idperiodo
                              AND M.modalidad = 'Presencial'                              
                              GROUP BY M.idcarrera");

      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraPeriodoVirtual($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                              FROM tb_matricula M 
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                  INNER JOIN tb_seccion S ON M.idseccion = S.idseccion
                              WHERE M.idperiodo = :idperiodo
                              AND S.seccion = 'En línea'                              
                              GROUP BY M.idcarrera");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarreraPeriodoValidacion($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                              FROM tb_matricula M 
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                  INNER JOIN tb_seccion S ON M.idseccion = S.idseccion
                                  INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                              WHERE M.idperiodo = :idperiodo
                              AND E.validacion = 1
                              GROUP BY M.idcarrera");
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

    public static function findDatosCarrera($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_carrera WHERE idcarrera = :idcarrera");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

  }

?>