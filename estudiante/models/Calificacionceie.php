<?php

    class Calificacionceie
    {
        public static function findCalificacionId($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT P.alias, C.idmodulo, C.idmatricula, C.calificacion
                                    FROM tb_ceie C
                                        INNER JOIN tb_matricula M ON C.idmatricula = M.idmatricula
                                        INNER JOIN tb_periodo P ON M.idperiodo = P.idperiodo
                                    WHERE M.idestudiante = :idestudiante
                                    ORDER BY C.idmodulo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Calificacionceie::class);
        }
    }