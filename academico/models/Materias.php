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

        public static function findDocenteMaterias($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmateria, M.codigo, M.materia
                                    FROM tb_detalle_cargahoraria D
                                    INNER JOIN tb_carga_horaria C ON D.idcarga_horaria = C.idcarga_horaria
                                    INNER JOIN tb_materia M ON D.idmateria = M.idmateria
                                    WHERE C.idperiodo = :idperiodo
                                    AND D.idcarrera = :idcarrera
                                    AND C.iddocente = :iddocente");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materias::class);
        }

        public static function findDiasLaborales($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT fecha FROM tb_asistencia
                                    WHERE idperiodo = :idperiodo
                                    AND idmateria = :idmateria
                                    GROUP BY fecha");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materias::class);
        }

        public static function findMateriaIdCarrera($params)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_materia_periodo_carrera2(:idperiodo, :idcarrera);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materias::class);
        }

    }

?>