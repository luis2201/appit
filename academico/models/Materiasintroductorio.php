<?php

    class Materiasintroductorio extends DB
    {
        public static function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_materia_introductorio_select_all()");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiasintroductorio::class);
        }

        public static function saveMateria($param)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_materia_introductorio_save(:idmateria, :idcarrera, :materia)");
            
            return $prepare->execute($param);
        }

        public static function findIdMateria($param)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_materia_introductorio_select_idmateria(:idmateria)");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiasintroductorio::class);
        }

        public static function deleteMateria($param)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_materia_introductorio WHERE idmateria = :idmateria");
            
            return $prepare->execute($param);
        }

        public static function findMateriaIdCarrera($param)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_materia_introductorio WHERE idcarrera = :idcarrera;");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiasintroductorio::class);
        }
    }

?>