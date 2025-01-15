<?php

    class Examenubicacion extends DB
    {
        public static function validaInscripcion($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_examen_ubicacion WHERE idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Examenubicacion::class);
        }

        public static function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_examen_ubicacion(idperiodo, idmatricula) VALUES(:idperiodo, :idmatricula)");
            
            return $prepare->execute($params);            
        }
    }

?>