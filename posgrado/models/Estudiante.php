<?php

    class Estudiante extends DB
    {
        public function findDatosEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.carrera, E.numero_identificacion, CONCAT(E.apellido1,' ',E.apellido2,' ',E.nombre1,' ',E.nombre2)AS estudiante
                                    FROM tb_estudiante E 
                                        INNER JOIN tb_matricula M ON E.idestudiante = M.idestudiante
                                        INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                    WHERE M.idmatricula = :idmatricula
                                    GROUP BY E.idestudiante");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public function findEstudianteIdCarrera($params)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_estudiante_introductorio_select_idperiodo_carrera(:idperiodo, :idcarrera)");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }
    }

?>