<?php

  class Promocion extends DB
  {
    public static function findMaterias($params)
    {
      $db = new DB();

      $prepare = $db->prepare("SELECT M.idmateria, M.codigo, M.materia
                              FROM tb_detalle_matricula D
                              INNER JOIN tb_matricula T ON D.idmatricula = T.idmatricula
                              INNER JOIN tb_materia M ON D.idmateria = M.idmateria
                              WHERE T.idperiodo = :idperiodo
                              AND D.idmatricula = :idmatricula
                              ORDER BY M.codigo");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Promocion::class);
    }


    public static function findParcial($params)
    {
      $db = new DB();

      $prepare = $db->prepare("SELECT *
                              FROM tb_calificacion C
                              WHERE C.idmatricula = :idmatricula
                              AND C.idmateria = :idmateria
                              AND C.idparcial = :idparcial");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Promocion::class);
    }

    public static function findVirtual($params)
    {
      $db = new DB();

      $prepare = $db->prepare("SELECT *
                              FROM tb_calificacion_virtual C
                              WHERE C.idmatricula = :idmatricula
                              AND C.idmateria = :idmateria");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Promocion::class);
    }

    public static function findCalificacion($params)
    {
      $db = new DB();

      $prepare = $db->prepare("SELECT *
                              FROM tb_calificacion_virtual C
                              WHERE C.idmatricula = :idmatricula
                              AND C.idmateria = :idmateria");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Promocion::class);
    }
  }

?>