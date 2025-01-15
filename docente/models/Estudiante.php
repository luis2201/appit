<?php

    class Estudiante extends DB
    {
        public static function findEstudianteIdMateria($params)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_estudiante_select_materia_virtual(:idperiodo, :idmateria);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }    

        public static function findCalificacionVirtualEstudiante($params)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_estudiante_select_calificacion_virtual(:idperiodo, :idmatricula, :idmateria);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        } 

        public static function findEstudianteIdMateriaValidacion($params)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1,' ', E.apellido2,' ', E.nombre1,' ', E.nombre2)AS estudiante
                                    FROM tb_detalle_matricula D 
                                    INNER JOIN tb_matricula M ON D.idmatricula = M.idmatricula
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND D.idmateria = :idmateria
                                    AND E.validacion = 1
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        } 

        public static function findCalificacionValidacionEstudiante($params)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_estudiante_select_calificacion_validacion(:idperiodo, :idmatricula, :idmateria);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        } 
    }

?>