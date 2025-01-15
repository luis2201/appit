<?php 

    class Configuracion extends DB
    {
        public static function findCalificacionesAll($idperiodo)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_configuracion_calificaciones_select_all(:idperiodo);");
            $prepare->execute([":idperiodo" => $idperiodo]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Configuracion::class);
        }

        public static function findConfigId($idconfiguracion)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT * FROM tb_configuracion_calificaciones WHERE idconfiguracion = :idconfiguracion;");
            $prepare->execute([":idconfiguracion" => $idconfiguracion]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Configuracion::class);
        }

        public static function updateConfig($idconfiguracion, $fecha_apertura, $fecha_cierre){
            $db = new DB();
            $prepare = $db->prepare("call sp_config_calificaciones_update(:idconfiguracion, :fecha_apertura, :fecha_cierre);");
            
            $prepare->execute([":idconfiguracion" => $idconfiguracion, ":fecha_apertura" => $fecha_apertura, ":fecha_cierre" => $fecha_cierre]);
        }
    }

?>