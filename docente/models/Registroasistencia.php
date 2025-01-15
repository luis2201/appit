<?php

    class Registroasistencia extends DB
    {
        public static function viewListaEstudianteMateria($params)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                    FROM tb_matricula M 
                                    INNER JOIN tb_detalle_matricula D ON M.idmatricula = D.idmatricula
                                    INNER JOIN tb_materia T ON D.idmateria = T.idmateria
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND T.idmateria = :idmateria
                                    AND E.validacion = 0
                                    AND M.estado = 1
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Registroasistencia::class);
        }

        public static function findAsistenciaIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_asistencia WHERE idperiodo = :idperiodo AND idmateria = :idmateria AND idmatricula = :idmatricula AND fecha = :fecha");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Registroasistencia::class);
        }

        public static function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_asistencia(idperiodo, idmateria, idmatricula, fecha, asistencia)
                                    VALUES(:idperiodo, :idmateria, :idmatricula, :fecha, :asistencia)");

            return $prepare->execute($params);
        }

        public static function ActualizaAsistencia($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_asistencia SET asistencia = :asistencia
                                    WHERE idperiodo = :idperiodo
                                    AND idmateria = :idmateria
                                    AND idmatricula = :idmatricula
                                    AND fecha = :fecha");
            return $prepare->execute($params);
        }

        public static function EliminaAsistencia($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_asistencia
                                    WHERE idperiodo = :idperiodo
                                    AND idmateria = :idmateria
                                    AND fecha = :fecha");

            return $prepare->execute($params);
        }
    }

?>