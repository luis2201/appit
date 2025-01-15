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
  
  }  

?>