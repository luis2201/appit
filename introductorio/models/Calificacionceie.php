<?php

    class Calificacionceie
    {
        public static function findCalificacionId($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_ceie WHERE idperiodo = :idperiodo AND idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FECTH_CLASS, Calificacionceie::class);
        }
    }