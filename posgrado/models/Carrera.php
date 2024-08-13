<?php

    class Carrera extends DB
    {
        public function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_carrera ORDER BY carrera;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
        }
    }

?>