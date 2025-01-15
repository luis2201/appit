<?php

    class Periodo extends DB
    {
        public function findActivo()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_periodo WHERE estado = 1");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
        }

        public function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_periodo ORDER BY fechainicio;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
        }
    }

?>