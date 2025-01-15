<?php

    class Malla extends DB
    {
        public static function findAll()
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_malla_select_all();");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Malla::class);
        }

        public static function findMateriaNivelCarreraPeriodo($params)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_malla_periodo_carrera_nivel(:idperiodo, :idcarrera, :idnivel);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Malla::class);
        }
    }

?>