<?php

    class Record extends DB
    {
    
        public static function findMateriasNotasEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT tb_estudiante.numero_identificacion,
                                    tb_materia_introductorio.idmateria,
                                    tb_materia_introductorio.materia,
                                    tb_periodo.periodo,
                                        SUM(CASE WHEN tb_calificacion_introductorio.idparcial = 1 THEN tb_calificacion_introductorio.total ELSE 0 END) +
                                        SUM(CASE WHEN tb_calificacion_introductorio.idparcial = 2 THEN tb_calificacion_introductorio.total ELSE 0 END) AS calificacion,
                                        SUM(CASE WHEN tb_calificacion_introductorio.idparcial = 1 THEN tb_calificacion_introductorio.supletorio ELSE 0 END) +
                                        SUM(CASE WHEN tb_calificacion_introductorio.idparcial = 2 THEN tb_calificacion_introductorio.supletorio ELSE 0 END) AS supletorio
                                    FROM tb_calificacion_introductorio
                                        JOIN tb_materia_introductorio ON tb_calificacion_introductorio.idmateria = tb_materia_introductorio.idmateria
                                        JOIN tb_periodo ON tb_calificacion_introductorio.idperiodo = tb_periodo.idperiodo
                                        JOIN tb_matricula ON tb_calificacion_introductorio.idmatricula = tb_matricula.idmatricula
                                        JOIN tb_estudiante ON tb_matricula.idestudiante = tb_estudiante.idestudiante
                                    WHERE tb_calificacion_introductorio.idparcial IN (1, 2)
                                    AND tb_matricula.idmatricula = :idmatricula
                                    AND tb_matricula.idnivel = :idnivel
                                    GROUP BY tb_estudiante.numero_identificacion,
                                        tb_materia_introductorio.idmateria,
                                        tb_materia_introductorio.materia,
                                        tb_periodo.periodo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Record::class);
        }
        
    }

?>