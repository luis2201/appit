<?php

    class Mensaje extends DB
    {
        public static function findAll($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_mensaje_docente WHERE iddocente = :iddocente");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Mensaje::class);
        }

        public static function actualizaMensaje($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_mensaje_docente SET estado = 0 WHERE idmensaje = :idmensaje");
            
            return $prepare->execute($params);            
        }   
        
        public static function delete($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_mensaje_docente WHERE idmensaje = :idmensaje");
            
            return $prepare->execute($params);            
        } 
    }

?>