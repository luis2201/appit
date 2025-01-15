<?php

    class Docente extends DB
    {
        public static function FindAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_docente ORDER BY apellido1, apellido2, nombre1, nombre2;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
        }

    }

?>