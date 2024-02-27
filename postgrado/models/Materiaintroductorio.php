<?php

    class Materiaintroductorio extends DB
    {
        public function findMateriaIdCarrera($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT * FROM tb_materia_introductorio WHERE idcarrera = :idcarrera");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiaintroductorio::class);
        }

        public function findMateriaIdMatricula($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT M.idmateria, M.materia
                                    FROM tb_detalle_matricula_introductorio D INNER JOIN tb_materia_introductorio M ON D.idmateria = M.idmateria
                                    WHERE D.idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiaintroductorio::class);
        }

    }