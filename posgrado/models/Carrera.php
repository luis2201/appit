<?php

    class Carrera extends DB
    {
        public function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_carrera ORDER BY carrera;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
        }

        public static function findCarreraIntroductorio($params)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT R.idcarrera, R.carrera 
                                    FROM tb_carga_horaria_introductorio C
                                        INNER JOIN tb_carrera R ON C.idcarrera = R.idcarrera
                                    WHERE C.idperiodo = :idperiodo
                                    GROUP BY R.idcarrera");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Carrera::class);
        }
    }

?>