<?php

    class Estudiante extends DB
    {
        public function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_estudiante ORDER BY apellido1, apellido2, nombre1, nombre2");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findDatosEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.carrera, E.numero_identificacion, CONCAT(E.apellido1,' ',E.apellido2,' ',E.nombre1,' ',E.nombre2)AS estudiante
                                    FROM tb_estudiante E 
                                        INNER JOIN tb_matricula M ON E.idestudiante = M.idestudiante
                                        INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                    WHERE E.numero_identificacion = :numero_identificacion
                                    GROUP BY E.idestudiante");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function findDatosEstudianteIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.carrera, E.numero_identificacion, CONCAT(E.apellido1,' ',E.apellido2,' ',E.nombre1,' ',E.nombre2)AS estudiante, N.nivel, C.carrera
                                    FROM tb_estudiante E 
                                        INNER JOIN tb_matricula M ON E.idestudiante = M.idestudiante
                                        INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                        INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                    WHERE M.idmatricula = :idmatricula
                                    GROUP BY E.idestudiante");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }
        
    }

?>