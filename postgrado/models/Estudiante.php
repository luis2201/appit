<?php

    class Estudiante extends DB
    {
        public function findEstudianteIdCarrera($params)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_estudiante_introductorio_select_idperiodo_carrera(:idperiodo, :idcarrera)");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Estudiante::class);
        }
    }

?>