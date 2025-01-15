<?php

    class Registrocalificacion extends DB
    {
        public static function ViewListaEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.idceie, CONCAT(E.apellido1,' ',E.apellido2,' ',E.nombre1,' ',E.nombre2) AS estudiante, C.calificacion
                                     FROM tb_ceie C
                                     INNER JOIN tb_matricula M ON C.idmatricula = M.idmatricula
                                     INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante 
                                     WHERE C.idperiodo = :idperiodo 
                                     AND C.idmodulo = :idmodulo
                                     ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacion::class);
        }

        public static function Save($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_ceie SET calificacion = :calificacion WHERE idceie = :idceie");
            
            return $prepare->execute($params);            
        }
    }