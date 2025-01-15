<?php

  class Provincia extends DB
  {

    public static function findAll()
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_provincia_select_all();");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Provincia::class);
    }
  
  }

?>