<?php

    class Carrera extends DB
    {
        public static function findCarreraIdPeriodo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.idcarrera, C.carrera
                                    FROM tb_matricula M
                                        INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                    WHERE M.idperiodo = :idperiodo
                                    GROUP BY C.carrera
                                    ORDER BY C.carrera");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
        }

    }

?>