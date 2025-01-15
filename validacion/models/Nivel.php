<?php

  class Nivel extends DB
  {
    
    public static function findAll()
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_nivel_select_all();");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelIdEstudiante($params)
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_nivel_idestudiante(:idestudiante);");
        $prepare->execute($params);

        return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }
  
  }  

?>