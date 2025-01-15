<?php

    class Notas extends DB
    {
        public static function findAll_ID($idperiodo, $idparcial, $idestudiante)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_calificaciones_estudiante_ID(:idperiodo, :idparcial, :idestudiante);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idparcial" => $idparcial, ":idestudiante" => $idestudiante]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Notas::class);
        }
    }

?>