<?php

  class Materia extends DB
  {
    public $idmateria;
    public $codigo;
    public $materia;
    public $nivel;

    public static function findAll($idperiodo, $idcarrera)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_materia_malla_select(:idperiodo, :idcarrera)");
      $prepare->execute([":idperiodo" => $idperiodo, "idcarrera" => $idcarrera]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
    }

    public static function finddetallematricula($idmatricula, $idmateria)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_materia_detallematricula_selectId(:idmatricula, :idmateria)");
      $prepare->execute([":idmatricula" => $idmatricula, "idmateria" => $idmateria]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
    }

  }
  
?>