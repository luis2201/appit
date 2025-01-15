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
    }

?>