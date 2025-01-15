<?php

  class Ciudad extends DB
  {

    public static function findAll()
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_ciudad_select_all();");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Ciudad::class);
    }
  
  }

?>