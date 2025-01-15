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

    public static function findSeccionIdPeriodo($params)
    {
      $db = new DB();

      $prepare = $db->prepare("SELECT S.idseccion, S.seccion
                                FROM tb_matricula M 
                                INNER JOIN tb_seccion S ON M.idseccion = S.idseccion
                                WHERE M.idperiodo = :idperiodo
                                AND M.idcarrera = :idcarrera
                                GROUP BY S.idseccion;");
      $prepare->execute($params);

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