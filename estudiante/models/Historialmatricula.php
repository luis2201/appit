<?php

    class Historialmatricula extends DB
    {
        public static function getMateriasIdPeriodo($idestudiante, $idperiodo)
        {
            $db = new DB();
            $prepare = $db->prepare("call 	sp_estudiante_materia_nivel(:idestudiante, :idperiodo)");
            $prepare->execute([":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Historialmatricula::class);
        }
    }

?>