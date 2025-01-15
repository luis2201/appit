<?php

    class Registrocalificacionvirtual extends DB
    {
        public static function Save($params)
        {
            $db = new DB();

            $prepare = $db->prepare("call sp_calificacion_virtual_save(:idperiodo, :idmatricula, :idcarrera, :idnivel, :idmateria, :aporte, :lecciones, :tdocencia, :practica, :tpractica, :aprendizaje, :taprendizaje, :resultado, :tresultado, :total);");
            
            return $prepare->execute($params);
        }

    }

?>