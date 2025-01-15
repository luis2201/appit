<?php

    class Docenteadmisiones extends DB
    {
        public static function findAll($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmodulo_docente, CONCAT(D.apellido1,' ',D.apellido2,' ',D.nombre1,' ',D.nombre2)AS docente, A.modulo
                                    FROM tb_modulo_docente M 
                                    INNER JOIN tb_docente D ON M.iddocente = D.iddocente
                                    INNER JOIN tb_modulo_admisiones A ON M.idmodulo = A.idmodulo
                                    WHERE idperiodo = :idperiodo;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docenteadmisiones::class);
        }

        public static function valida($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_modulo_docente 
                                     WHERE idperiodo = :idperiodo 
                                     AND iddocente = :iddocente
                                     AND idmodulo = :idmodulo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Docenteadmisiones::class);
        }

        public static function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_modulo_docente(idperiodo, iddocente, idmodulo)
                                     VALUES(:idperiodo, :iddocente, :idmodulo)");
            return $prepare->execute($params);            
        }

        public static function Delete($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_modulo_docente WHERE idmodulo_docente = :idmodulo_docente;");
            return $prepare->execute($params);            
        }
    }