<?php

    class Certificadomatricula extends DB
    {
        public static function findIdEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT CONCAT(E.apellido1,' ', E.apellido2,' ', E.nombre1,' ', E.nombre2)as estudiante, C.carrera, N.nivel, P.alias, M.idmatricula
                                    FROM tb_estudiante E 
                                    INNER JOIN tb_matricula M ON E.idestudiante = M.idestudiante
                                    INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                    INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    INNER JOIN tb_periodo P ON M.idperiodo = P.idperiodo
                                    WHERE M.idperiodo = :idperiodo
                                    AND E.numero_identificacion = :numero_identificacion");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Certificadomatricula::class);
        }

        public static function findIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT CONCAT(E.apellido1,' ', E.apellido2,' ', E.nombre1,' ', E.nombre2)as estudiante, E.numero_identificacion, C.carrera, N.nivel, P.idperiodo, P.alias, M.idmatricula, M.numero_matricula
                                    FROM tb_estudiante E 
                                    INNER JOIN tb_matricula M ON E.idestudiante = M.idestudiante
                                    INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                    INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    INNER JOIN tb_periodo P ON M.idperiodo = P.idperiodo                                    
                                    AND M.idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Certificadomatricula::class);
        }

        public static function findIdMatriculaMaterias($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.materia, N.nivel, M.creditos
                        FROM tb_detalle_matricula D
                        INNER JOIN tb_matricula T ON D.idmatricula = T.idmatricula
                        INNER JOIN tb_materia M ON D.idmateria = M.idmateria
                        INNER JOIN tb_malla L ON M.idmateria = L.idmateria
                        INNER JOIN tb_nivel N ON L.idnivel = N.idnivel
                        WHERE T.idperiodo = :idperiodo
                        AND T.idmatricula = :idmatricula
                        GROUP BY M.idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Certificadomatricula::class);
        }

        public static function findIdMatriculaMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.materia, N.nivel, M.creditos
                        FROM tb_detalle_matricula D
                        INNER JOIN tb_matricula T ON D.idmatricula = T.idmatricula
                        INNER JOIN tb_materia M ON D.idmateria = M.idmateria
                        INNER JOIN tb_malla L ON M.idmateria = L.idmateria
                        INNER JOIN tb_nivel N ON L.idnivel = N.idnivel                        
                        AND T.idmatricula = :idmatricula
                        GROUP BY M.idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Certificadomatricula::class);
        }
    }

?>