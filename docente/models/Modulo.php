<?php 

    class Modulo extends DB
    {
        public static function findIdDocente($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.idmodulo, M.modulo
                                    FROM tb_modulo_docente D 
                                    INNER JOIN tb_modulo_admisiones M ON D.idmodulo = M.idmodulo
                                    WHERE D.idperiodo = :idperiodo
                                    AND D.iddocente = :iddocente");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Modulo::class);
        }
    }