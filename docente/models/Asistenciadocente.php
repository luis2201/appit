<?php

    class Asistenciadocente extends DB
    {

        public static function ViewListaEstudiantes($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                    FROM tb_matricula M 
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                        INNER JOIN tb_detalle_matricula D ON M.idmatricula = D.idmatricula
                                    WHERE M.idperiodo = :idperiodo
                                    AND D.idmateria = :idmateria
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asistenciadocente::class);
        }

        public static function findIdMatriculaFecha($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT fecha, asistencia FROM tb_asistencia 
                                    WHERE idmateria = :idmateria
                                    AND idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asistenciadocente::class);
        }

    }

?>