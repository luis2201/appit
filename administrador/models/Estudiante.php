<?php

    class Estudiante extends DB
    {
        public static function FindAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_estudiante ORDER BY apellido1, apellido2, nombre1, nombre2;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }

        public static function EstadoValidacion($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_estudiante SET validacion = :estado WHERE idestudiante = :idestudiante");
            
            return $prepare->execute($params);
        }

        public static function EstadoIntroductorio($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_estudiante SET introductorio = :estado WHERE idestudiante = :idestudiante");
            
            return $prepare->execute($params);
        }

        public static function UpdateDatos($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_estudiante SET numero_identificacion = :numero_identificacion, 
                                                              correo_electronico = :correo_electronico,
                                                              contrasena = :contrasena
                                    WHERE idestudiante = :idestudiante");
            
            return $prepare->execute($params);
        }

        public static function findEstudiantesIdMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT iddetalle_matricula, M.numero_matricula, E.numero_identificacion, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                    FROM tb_detalle_matricula D
                                        INNER JOIN tb_matricula M ON D.idmatricula = M.idmatricula
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND D.idmateria = :idmateria
                                    AND E.validacion = 0
                                    AND E.introductorio = 0
                                    AND M.estado = 1
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }
    }

?>