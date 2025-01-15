<?php

    class Calificaciones extends DB
    {

        public function findCalificacionParcial($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT * FROM tb_calificacion_introductorio 
                                     WHERE idmatricula = :idmatricula
                                     AND idmateria = :idmateria
                                     AND idparcial = :idparcial");

            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Calificaciones::class);
        }

    }