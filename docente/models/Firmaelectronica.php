<?php

    class Firmaelectronica extends DB
    {
        public static function findIdDocente($param)
        {
            $db = new DB;

            $prepare = $db->prepare("SELECT * FROM tb_docente WHERE iddocente = :iddocente");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Firmaelectronica::class);
        }
        
        public static function register($param)
        {
            $db = new DB;

            $prepare = $db->prepare("UPDATE tb_docente SET doc_firma = :doc_firma, pas_firma = :pas_firma WHERE iddocente = :iddocente;");
            
            return $prepare->execute($param);
        }

        public static function validatePassFirma($param)
        {
            $db = new DB;

            $prepare = $db->prepare("SELECT * FROM tb_docente WHERE iddocente = :iddocente AND pas_firma = :pas_firma");
            $prepare->execute($param);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Firmaelectronica::class);
        }
    }

?>