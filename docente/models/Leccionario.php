<?php

    class Leccionario extends DB
    {
        public static function ValidaAsistenciaFecha($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_leccionario 
                                     WHERE idperiodo = :idperiodo 
                                     AND idmateria = :idmateria 
                                     AND fecha = :fecha");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Leccionario::class);
        }

        public static function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare('INSERT INTO tb_leccionario(idperiodo, idmateria, fecha, unidad, actividades, tareas)
                                     VALUES(:idperiodo, :idmateria, :fecha, :unidad, :actividades, :tareas)');
            
            return $prepare->execute($params);
        }

        public static function EliminaLeccionario($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_leccionario
                                    WHERE idperiodo = :idperiodo
                                    AND idmateria = :idmateria
                                    AND fecha = :fecha");
                                    
            return $prepare->execute($params);
        }

        public static function viewActividades($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_leccionario 
                                     WHERE idperiodo = :idperiodo 
                                     AND idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Leccionario::class);
        }
    }

?>