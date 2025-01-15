<?php

    class Modalidad extends DB
    {
        public static function findModalidadidCarreraIdPeriodo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT modalidad
                                    FROM tb_matricula
                                    WHERE idperiodo = :idperiodo
                                    AND idcarrera = :idcarrera
                                    GROUP BY modalidad");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Modalidad::class);
        }

    }

?>