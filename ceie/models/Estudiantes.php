<?php 

    class Estudiantes extends DB
    {
        public static function findAllEstudiantesPeriodo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1,' ', E.apellido2,' ', E.nombre1,' ', E.nombre2)AS estudiante
                                    FROM tb_matricula M
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiantes::class);
        }

        public static function findAllEstudiantesPeriodoModulo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1,' ', E.apellido2,' ', E.nombre1,' ', E.nombre2)AS estudiante 
                                    FROM tb_matricula M 
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante 
                                    WHERE M.idperiodo = :idperiodo 
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiantes::class);
        }

        public static function findAllEstudiantesSuficiencia($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT E.idmatricula, CONCAT(S.apellido1,' ', S.apellido2,' ', S.nombre1,' ', S.nombre2)AS estudiante, E.calificacion
                                    FROM tb_examen_suficiencia E
                                        INNER JOIN tb_matricula M ON E.idmatricula = M.idmatricula 
                                        INNER JOIN tb_estudiante S ON M.idestudiante = S.idestudiante 
                                    WHERE E.idperiodo = :idperiodo
                                    ORDER BY S.apellido1, S.apellido2, S.nombre1, S.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiantes::class);
        }
    }

?>