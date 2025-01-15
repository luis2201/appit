<?php

    class Asignarmateria extends DB
    {
        public static function saveMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_detallematricula_introductorio_insert(:idmatricula, :idmateria)");
            
            return $prepare->execute($params);
        }

        public static function deleteMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_detallematricula_introductorio_delete(:idmatricula, :idmateria)");
            
            return $prepare->execute($params);
        }

        public function findMateriaIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_detalle_matricula_introductorio WHERE idmatricula = :idmatricula AND idmateria = :idmateria");            
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asignarmateria::class);
        }
    }

?>