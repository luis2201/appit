<?php

  class Nivel extends DB
  {

    public static function findAllIdEstudiante($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                              FROM tb_matricula M 
                                INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                              WHERE M.idmatricula = :idmatricula");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

  }

?>