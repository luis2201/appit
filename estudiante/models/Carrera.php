<?php

  class Carrera extends DB
  {
    public $idcarrera; 
    public $idmatricula;

    public static function findAll()
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_carrera_select_all();");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
    }

    public static function findCarrera($idestudiante, $idcarrera)
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_carrera_matricula_select(:idestudiante, :idcarrera);");
        $prepare->execute([":idestudiante" => $idestudiante, ":idcarrera" => $idcarrera]);

        return $prepare->fetchObject(Carrera::class);
    }
  
  }  

?>