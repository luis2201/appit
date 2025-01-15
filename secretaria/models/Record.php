<?php

    class Record extends DB
    {
        public static function FindRecordCursoEstudiante()
        {
            $db = new DB();

            $prepare = $db->prepare("");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Record::class);
        }

        public static function findMateriasNotasEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT tb_estudiante.numero_identificacion,
                                            tb_matricula.idmatricula,
                                            tb_materia.idmateria,
                                            tb_materia.codigo,
                                            tb_materia.idmateria,
                                            tb_materia.materia,
                                            tb_periodo.idperiodo,
                                            tb_periodo.periodo,
                                            SUM(CASE WHEN tb_calificacion.idparcial = 1 THEN tb_calificacion.total ELSE 0 END) +
                                            SUM(CASE WHEN tb_calificacion.idparcial = 2 THEN tb_calificacion.total ELSE 0 END) AS calificacion,
                                            SUM(CASE WHEN tb_calificacion.idparcial = 1 THEN tb_calificacion.supletorio ELSE 0 END) +
                                            SUM(CASE WHEN tb_calificacion.idparcial = 2 THEN tb_calificacion.supletorio ELSE 0 END) AS supletorio
                                    FROM tb_calificacion
                                    JOIN tb_materia ON tb_calificacion.idmateria = tb_materia.idmateria
                                    JOIN tb_periodo ON tb_calificacion.idperiodo = tb_periodo.idperiodo
                                    JOIN tb_matricula ON tb_calificacion.idmatricula = tb_matricula.idmatricula
                                    JOIN tb_estudiante ON tb_matricula.idestudiante = tb_estudiante.idestudiante
                                    WHERE tb_calificacion.idparcial IN (1, 2)
                                    AND tb_estudiante.numero_identificacion = :numero_identificacion
                                    AND tb_matricula.idnivel = :idnivel
                                    GROUP BY tb_estudiante.numero_identificacion,
                                            tb_materia.idmateria,
                                            tb_materia.codigo,
                                            tb_materia.materia,
                                            tb_periodo.periodo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Record::class);
        }

        public static function findMateriasNotasEstudianteEnlinea($params)
        {
            $db = new DB();

            // $prepare = $db->prepare("SELECT T.materia, P.periodo, C.total, C.supletorio, C.final
            //                         FROM tb_calificacion_virtual C
            //                             INNER JOIN tb_matricula M ON C.idmatricula = M.idmatricula
            //                             INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
            //                             INNER JOIN tb_materia T ON C.idmateria = T.idmateria
            //                             INNER JOIN tb_periodo P ON C.idperiodo = P.idperiodo
            //                         WHERE E.numero_identificacion = :numero_identificacion
            //                         AND C.idnivel = :idnivel");
            $prepare = $db->prepare("SELECT tb_estudiante.numero_identificacion,
                                            tb_matricula.idmatricula,
                                            tb_materia.idmateria,
                                            tb_materia.codigo,
                                            tb_materia.idmateria,
                                            tb_materia.materia,
                                            tb_periodo.idperiodo,
                                            tb_periodo.periodo,
                                            SUM(CASE WHEN tb_calificacion_virtual.idparcial = 1 THEN tb_calificacion_virtual.total ELSE 0 END) +
                                            SUM(CASE WHEN tb_calificacion_virtual.idparcial = 2 THEN tb_calificacion_virtual.total ELSE 0 END) AS calificacion,
                                            SUM(CASE WHEN tb_calificacion_virtual.idparcial = 1 THEN tb_calificacion_virtual.supletorio ELSE 0 END) +
                                            SUM(CASE WHEN tb_calificacion_virtual.idparcial = 2 THEN tb_calificacion_virtual.supletorio ELSE 0 END) AS supletorio
                                    FROM tb_calificacion_virtual
                                    JOIN tb_materia ON tb_calificacion_virtual.idmateria = tb_materia.idmateria
                                    JOIN tb_periodo ON tb_calificacion_virtual.idperiodo = tb_periodo.idperiodo
                                    JOIN tb_matricula ON tb_calificacion_virtual.idmatricula = tb_matricula.idmatricula
                                    JOIN tb_estudiante ON tb_matricula.idestudiante = tb_estudiante.idestudiante
                                    WHERE tb_calificacion_virtual.idparcial IN (1, 2)
                                    AND tb_estudiante.numero_identificacion = :numero_identificacion
                                    AND tb_matricula.idnivel = :idnivel
                                    GROUP BY tb_estudiante.numero_identificacion,
                                            tb_materia.idmateria,
                                            tb_materia.codigo,
                                            tb_materia.materia,
                                            tb_periodo.periodo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Record::class);
        }

        public static function findMateriasNotasEstudianteValidacion($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT T.materia, P.periodo, C.total, C.supletorio, C.final
                                    FROM tb_calificacion_validacion C
                                        INNER JOIN tb_matricula M ON C.idmatricula = M.idmatricula
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                        INNER JOIN tb_materia T ON C.idmateria = T.idmateria
                                        INNER JOIN tb_periodo P ON C.idperiodo = P.idperiodo
                                    WHERE E.numero_identificacion = :numero_identificacion
                                    AND C.idnivel = :idnivel");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Record::class);
        }

        public static function findRecordAcademicoPresencial($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT 
                                        C.idmatricula,
                                        C.idmateria,
                                        T.materia,
                                        P.idperiodo,
                                        P.periodo,
                                        SUM(CASE WHEN C.idparcial = 1 THEN COALESCE(tdocencia, 0) + COALESCE(tpracticas, 0) + COALESCE(taprendizaje, 0) + COALESCE(tresultados, 0) ELSE 0 END) AS parcial1,
                                        SUM(CASE WHEN C.idparcial = 2 THEN COALESCE(tdocencia, 0) + COALESCE(tpracticas, 0) + COALESCE(taprendizaje, 0) + COALESCE(tresultados, 0) ELSE 0 END) AS parcial2,
                                        SUM(COALESCE(total, 0)) AS calificacion,
                                        SUM(COALESCE(supletorio, 0)) AS supletorio
                                    FROM 
                                        tb_calificacion C
                                        INNER JOIN tb_matricula M ON C.idmatricula = M.idmatricula
                                        INNER JOIN tb_materia T ON C.idmateria = T.idmateria
                                        INNER JOIN tb_periodo P ON M.idperiodo = P.idperiodo
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE 
                                        E.numero_identificacion = :numero_identificacion
                                    AND 
                                        M.idcarrera = :idcarrera
                                    AND
                                        M.idnivel = :idnivel
                                    GROUP BY 
                                        C.idmatricula, C.idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Record::class);
        }
    }

?>

