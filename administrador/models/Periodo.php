<?php

    class Periodo extends DB
    {
        public static function FindAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_periodo ORDER BY fechainicio");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
        }

        public static function FindActivo()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_periodo WHERE estado = 1;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
        }
        
    }

?>