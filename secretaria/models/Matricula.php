<?php

  class Matricula
  {

    public static function findmatricula($idmatricula)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_matricula_select_idmatricula(:idmatricula)");
      $prepare->execute([":idmatricula" => $idmatricula]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
    }

    public static function finddetallematricula($idmatricula)
    {
      $db = new DB();
      // $prepare = $db->prepare("call sp_detallematricula_select_idmatricula(:idmatricula)");
      $prepare = $db->prepare("SELECT D.iddetalle_matricula, D.idmatricula, M.codigo, M.idmateria, M.materia, N.nivel, D.estado
                              FROM tb_detalle_matricula D
                              INNER JOIN tb_matricula T ON D.idmatricula=T.idmatricula
                              INNER JOIN tb_materia M ON D.idmateria=M.idmateria
                              INNER JOIN tb_malla L ON M.idmateria = L.idmateria
                              INNER JOIN tb_nivel N ON L.idnivel = N.idnivel
                              WHERE D.idmatricula=:idmatricula
                              GROUP BY M.idmateria");
      $prepare->execute([":idmatricula" => $idmatricula]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
    }

    public static function cambioestado($iddetalle_matricula)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_detallematricula_materia_aprobado(:iddetalle_matricula);");
      return $prepare->execute([":iddetalle_matricula" => $iddetalle_matricula]);
    }

    public static function apruebamatricula($idmatricula)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_matricula_aprobado(:idmatricula);");
      return $prepare->execute([":idmatricula" => $idmatricula]);
    }

    public static function estadomatricula($idmatricula)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_matricula_select_estado(:idmatricula);");
      $prepare->execute([":idmatricula" => $idmatricula]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
    }

    public static function validapendiente($idmatricula)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_detallematricula_materia_pendiente(:idmatricula);");
      $prepare->execute([":idmatricula" => $idmatricula]);

      return $prepare->fetchAll();
    }

    public static function eliminamateria($iddetalle_matricula)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_detallematricula_materia_eliminar(:iddetalle_matricula);");
      $prepare->execute([":iddetalle_matricula" => $iddetalle_matricula]);
    }

    public static function NoValidadas($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_matricula_select_novalidada(:idperiodo);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
    }

  }

?>
