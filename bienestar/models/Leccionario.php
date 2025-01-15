<?php

    class Leccionario extends DB
    {
        public static function ValidaAsistenciaFecha($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_leccionario 
                                     WHERE idperiodo = :idperiodo 
                                     AND idcarrera = :idcarrera
                                     AND idseccion = :idseccion 
                                     AND modalidad = :modalidad 
                                     AND idnivel = :idnivel 
                                     AND idmateria = :idmateria 
                                     AND fecha = :fecha");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Leccionario::class);
        }

        public static function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare('INSERT INTO tb_leccionario(idperiodo, idcarrera, idseccion, modalidad, idnivel, idmateria, fecha, unidad, actividades, tareas)
                                     VALUES(:idperiodo, :idcarrera, :idseccion, :modalidad, :idnivel, :idmateria, :fecha, :unidad, :actividades, :tareas)');
            
            return $prepare->execute($params);
        }
    }

?>