<?php

    class Ceie extends DB
    {
        public static function findIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT idmatricula FROM tb_matricula WHERE idestudiante = :idestudiante AND idperiodo = :idperiodo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Ceie::class);
        }

        public static function findModulo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT P.periodo, C.idmodulo, C.estado
                                    FROM tb_ceie C 
                                    INNER JOIN tb_matricula M ON C.idmatricula = M.idmatricula
                                    INNER JOIN tb_periodo P ON C.idperiodo = P.idperiodo
                                    WHERE M.idestudiante = :idestudiante");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Ceie::class);
        }

        public static function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_ceie(idperiodo, idmatricula, idmodulo) VALUE(:idperiodo, :idmatricula, :idmodulo);");
            return $prepare->execute($params);
        }

        public static function findMatriculaModulo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_ceie WHERE idperiodo = :idperiodo AND idmatricula = :idmatricula AND idmodulo = :idmodulo;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Ceie::class);
        }
    }

?>