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
    }

?>