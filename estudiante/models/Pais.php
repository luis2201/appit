<?php

  class Pais extends DB
  {

    public static function findAll()
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_pais_select_all();");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Pais::class);
    }
  
  }

?>