<?php

    class Materias extends DB
    {
        public static function findAll()
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_materias_select_all();");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materias::class);
        }

        public static function findMateriaMalla($idperiodo, $idcarrera, $idnivel)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_malla_periodo_carrera_nivel(:idperiodo, :idcarrera, :idnivel);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materias::class);
        }

        public static function findAllMateriaPeriodoCarrera($params)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_materia_malla_select(:idperiodo, :idcarrera);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materias::class);
        }

        public static function findMateriasIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmateria, M.codigo, M.materia
                                    FROM tb_detalle_matricula D
                                    INNER JOIN tb_matricula T ON D.idmatricula = T.idmatricula
                                    INNER JOIN tb_materia M ON D.idmateria = M.idmateria                              
                                    AND D.idmatricula = :idmatricula
                                    ORDER BY M.codigo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Promocion::class);
        }

    }

?>