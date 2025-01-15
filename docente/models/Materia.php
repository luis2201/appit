<?php

    class Materia extends DB
    {
        public static function findMateriaIdDocente($params)
        {
            $db = new DB();
        
            // $prepare = $db->prepare("call sp_materias_linea_select_iddocente(:idperiodo, :iddocente, :idcarrera, :idnivel);");
            $prepare = $db->prepare("call sp_materias_linea_select_iddocente(:idperiodo, :iddocente);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public function findMateriasIdDocente($params)
        {
            $db = new DB();
        
            $prepare = $db->prepare("call sp_materias_select_iddocente(:idperiodo, :iddocente, :idcarrera, :idnivel);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public function findMateriasValidacion($params)
        {
            $db = new DB();
        
            $prepare = $db->prepare("SELECT T.idmateria, CONCAT(T.codigo, '-', T.materia) AS materia
                                    FROM tb_detalle_matricula D
                                        INNER JOIN tb_materia T ON T.idmateria = D.idmateria
                                        INNER JOIN tb_matricula M ON D.idmatricula = M.idmatricula
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    AND M.idnivel = :idnivel
                                    GROUP BY T.idmateria
                                    ORDER BY T.idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
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

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public static function findDiasLaborales($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT fecha FROM tb_asistencia
                                    WHERE idperiodo = :idperiodo
                                    AND idmateria = :idmateria
                                    GROUP BY fecha");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public static function findDatosDocenteMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT CONCAT(D.nombre1,' ', D.nombre2,' ', D.apellido1,' ', D.apellido2)AS docente, M.materia
                                    FROM tb_carga_horaria_introductorio C
                                        INNER JOIN tb_docente D ON C.iddocente = D.iddocente
                                        INNER JOIN tb_materia_introductorio M ON C.idmateria_introductorio = M.idmateria
                                    WHERE C.idperiodo = :idperiodo
                                    AND C.idmateria_introductorio = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }
    }

?>