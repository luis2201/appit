<?php

    class Materia extends DB
    {
        public function findMateriaIdDocente($params)
        {
            $db = new DB();
        
            $prepare = $db->prepare("call sp_materias_linea_select_iddocente(:idperiodo, :iddocente, :idcarrera, :idnivel);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public static function findMateriaPeriodoCarrera($params)
        {
            $db = new DB();
        
            $prepare = $db->prepare("call sp_materia_periodo_carrera(:idperiodo, :idcarrera);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }
    }

?>