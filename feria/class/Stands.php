<?php

    require 'DB.php';

    class Stands extends DB
    {
        public static function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_stand;");
            $prepare->execute();
            
            return $prepare->fetchAll(PDO::FETCH_CLASS, Stands::class);
        }

        public static function findStands($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_stand WHERE idusuario = :idusuario;");
            $prepare->execute($params);
            
            return $prepare->fetchAll(PDO::FETCH_CLASS, Stands::class);
        }
    }

?>