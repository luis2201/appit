<?php

    class Modulo extends DB
    {
    
        public static function findAll()
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT * FROM tb_modulo_admisiones");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Modulo::class);
        }

    }

?>