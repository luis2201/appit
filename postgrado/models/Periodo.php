<?php

    class Periodo extends DB
    {
        public function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_periodo ORDER BY periodo;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
        }
    }

?>