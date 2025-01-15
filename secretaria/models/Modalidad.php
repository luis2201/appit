<?php

    class Modalidad extends DB
    {
        public static function findModalidadSeccionCarrera($params)
        {
            $db = new DB();

            $prepare = $db->prepare("call sp_modalidad_carrera_seccion(:idperiodo, :idcarrera, :idseccion);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Modalidad::class);
        }

        public static function findModalidadCarrera($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.modalidad
                                    FROM tb_matricula M
                                        INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    GROUP BY M.modalidad;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Modalidad::class);
        }
    }

?>