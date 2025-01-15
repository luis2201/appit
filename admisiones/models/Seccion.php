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
  
  }  

?>