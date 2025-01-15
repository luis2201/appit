<?php

    class Nivel extends DB
    {
        public static function findNivelModalidadidCarreraIdPeriodo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                                    FROM tb_matricula M
                                        INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    AND M.modalidad = :modalidad
                                    GROUP BY N.nivel
                                    ORDER BY N.idnivel");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
        }

        public static function findNivelIdCarrera($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                                    FROM tb_matricula M
                                        INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    GROUP BY N.nivel
                                    ORDER BY N.idnivel");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
        }

    }

?>