<?php

    class Registromatricula extends DB
    {

        public static function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_matricula(idestudiante, idperiodo, idcarrera, idnivel, modalidad, estado)
                                     VALUES(:idestudiante, :idperiodo, :idcarrera, :idnivel, :modalidad, :estado)");
            
            return $prepare->execute($params);
        }

        public static function findIdMatricula($params)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT * FROM tb_matricula WHERE idperiodo = :idperiodo AND idestudiante = :idestudiante;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Registromatricula::class);
        }

        public static function InsertMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_detalle_matricula(idmatricula, idmateria, estado)
                                     VALUES(:idmatricula, :idmateria, :estado)");
            
            return $prepare->execute($params);
        }

        public static function CompruebaDetalleMatricula($params)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT * FROM tb_detalle_matricula WHERE idmatricula = :idmatricula AND idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Registromatricula::class);
        }

        public static function DeleteMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_detalle_matricula WHERE idmatricula = :idmatricula AND idmateria = :idmateria");
            
            return $prepare->execute($params);
        }

    }

?>