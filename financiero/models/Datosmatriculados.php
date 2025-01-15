<?php

    class Datosmatriculados extends DB
    {
        public static function FindNumeroIdentificacion($params)
        {
            $db = new DB();

            $prepare = $db->prepare("call sp_estudiante_select_identificacion(:numero_identificacion)");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Datosmatriculados::class);
        }
    }
?>