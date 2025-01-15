<?php

    class Asistencia extends DB
    {
        public static function findMateriasIdEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT T.idmateria, T.codigo, T.materia
                                    FROM tb_detalle_matricula D
                                    INNER JOIN tb_matricula M ON D.idmatricula = M.idmatricula
                                    INNER JOIN tb_materia T ON D.idmateria = T.idmateria
                                    INNER JOIN tb_estudiante E ON E.idestudiante = M.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND E.idestudiante = :idestudiante");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asistencia::class);
        } 

        public static function findHorasClase($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT fecha
                                    FROM tb_asistencia 
                                    WHERE idperiodo = :idperiodo
                                    AND idmateria = :idmateria
                                    GROUP BY fecha");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asistencia::class);
        }

        public static function findAsistencias($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT A.asistencia
                                    FROM tb_asistencia A
                                    INNER JOIN tb_matricula M ON A.idmatricula = M.idmatricula
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE A.idperiodo = :idperiodo
                                    AND E.idestudiante = :idestudiante
                                    AND A.idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asistencia::class);
        }

        public static function findAsistenciasIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT A.asistencia
                                    FROM tb_asistencia A
                                    INNER JOIN tb_matricula M ON A.idmatricula = M.idmatricula
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE A.idperiodo = :idperiodo
                                    AND A.idmatricula = :idmatricula
                                    AND A.idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asistencia::class);
        }
    }