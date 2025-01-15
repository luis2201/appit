<?php

    class Actualizarfoto extends DB
    {
        
        public static function updateFoto($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_estudiante SET foto = :foto WHERE idestudiante = :idestudiante;");

            return $prepare->execute($params);
        }

    }

?>