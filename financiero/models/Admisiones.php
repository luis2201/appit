<?php

    class Admisiones extends DB
    {
        public static function findAll()
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT * FROM tb_admisiones;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Admisiones::class);
        }

        public static function findadmisionesId($idadmisiones)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT * FROM tb_admisiones WHERE idadmisiones = :idadmisiones;");
            $prepare->execute([":idadmisiones" => $idadmisiones]);

            return $prepare->fetchObject(Admisiones::class);
        }
    }

?>
