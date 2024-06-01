<?php

    class Mallaacademica extends DB
    {

        public static function findMallaIdPeriodo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmateria, M.codigo, M.materia 
                                    FROM tb_malla L
                                        INNER JOIN tb_materia M ON L.idmateria = M.idmateria
                                    WHERE L.idperiodo = :idperiodo
                                    AND L.idcarrera = :idcarrera
                                    AND L.idnivel = :idnivel");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Mallaacademica::class);
        }

    }