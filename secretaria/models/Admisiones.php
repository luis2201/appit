<?php

    class Admisiones extends DB
    {
        public static function findall($idperiodo)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_admisiones_select_idperiodo(:idperiodo)");
            $prepare->execute(["idperiodo" => $idperiodo]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Admisiones::class);
        }

        public static function findcedula($numero_identificacion)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_admisiones_select_identificacion(:numero_identificacion)");
            $prepare->execute(["numero_identificacion" => $numero_identificacion]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Admisiones::class);
        }

        public static function inconsistenciaDatos($numero_identificacion)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_admisiones_cambio_estado(:numero_identificacion)");
            $prepare->execute(["numero_identificacion" => $numero_identificacion]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Admisiones::class);
        }

        public static function rechazarAdmisiones($iddetalle_admision)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_admisiones_delete(:iddetalle_admision)");
            $prepare->execute(["iddetalle_admision" => $iddetalle_admision]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Admisiones::class);
        } 
        
        public static function aprobarAdmisiones($iddetalle_admision)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_detalle_admision_aprobar(:iddetalle_admision)");
            $prepare->execute(["iddetalle_admision" => $iddetalle_admision]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Admisiones::class);
        } 
    }

?>