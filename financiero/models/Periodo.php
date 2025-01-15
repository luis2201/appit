<?php

  class Periodo extends DB
  {
    
    public static function findActivo()
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_periodo_select_activo();");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
    }

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("call 	sp_periodo_select_all();");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
    }
  
  }  

?>