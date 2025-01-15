<?php

    class Modalidad extends DB
    {
        public static function findModalidadIdPeriodoTutor($idperiodo, $iddocente, $idcarrera, $idnivel, $idseccion)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_modalidad_select_idperiodo_tutor(:idperiodo, :iddocente, :idcarrera, :idnivel, :idseccion);");
            $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel, ":idseccion" => $idseccion]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Modalidad::class);
        }
    }

?>