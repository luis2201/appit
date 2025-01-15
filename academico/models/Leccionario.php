<?php

    class Leccionario extends DB
    {

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