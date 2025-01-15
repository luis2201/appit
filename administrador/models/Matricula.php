<?php

    class Matricula extends DB
    {
        public static function findEstudianteLista($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmatricula, M.numero_matricula, E.numero_identificacion, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)estudiantes, E.estado AS estadodatos, M.estado AS estadomatricula
                                    FROM tb_matricula M
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    AND M.modalidad = :modalidad
                                    AND M.idnivel = :idnivel
                                    AND E.validacion = 0
                                    AND E.introductorio = 0
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
        }

        public static function findEstudiantesLista($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmatricula, M.numero_matricula, E.numero_identificacion, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)estudiantes
                                    FROM tb_matricula M
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    AND M.idnivel = :idnivel
                                    AND E.validacion = 0
                                    AND E.introductorio = 0
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
        }

        public static function findDatosMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.numero_matricula, E.numero_identificacion, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante, C.idcarrera, C.carrera, N.nivel, M.idperiodo
                                    FROM tb_matricula M 
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                        INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                        INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    WHERE M.idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
        }

        public static function validaMateriaIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_detalle_matricula
                                    WHERE idmatricula = :idmatricula
                                    AND idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Matricula::class);
        }

        public static function agregaMateriaIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_detalle_matricula(idmatricula, idmateria)
                                    VALUES(:idmatricula, :idmateria);");
            
            return $prepare->execute($params);
        }

        public static function eliminaMateriaIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_detalle_matricula
                                    WHERE idmatricula = :idmatricula
                                    AND idmateria = :idmateria;");
            
            return $prepare->execute($params);
        }

    }

?>