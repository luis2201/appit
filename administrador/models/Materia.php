<?php

    class Materia extends DB
    {
        public static function findMateriaIdCarrera($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT T.idmateria, T.codigo, T.materia, N.nivel
                                    FROM tb_malla M
                                        INNER JOIN tb_materia T ON M.idmateria = T.idmateria
                                        INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    ORDER BY T.codigo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public static function findMateriaIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_detalle_matricula 
                                    WHERE idmatricula = :idmatricula
                                    AND idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }
    }

?>