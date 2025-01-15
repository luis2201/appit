<?php

    class Cargahorariaintroductorio extends DB
    {
        public static function findAll($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT CONCAT(D.apellido1, ' ', D.apellido2, ' ', D.nombre1, ' ', D.nombre2)AS docente, R.carrera, M.materia
            FROM tb_carga_horaria_introductorio C
                INNER JOIN tb_docente D ON C.iddocente = D.iddocente
                INNER JOIN tb_carrera R ON C.idcarrera = R.idcarrera
                INNER JOIN tb_materia_introductorio M ON C.idmateria_introductorio = M.idmateria
            WHERE C.idperiodo = :idperiodo
            ORDER BY D.apellido1, D.apellido2, D.nombre1, D.nombre2");

            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cargahorariaintroductorio::class);
        }

        public static function saveDocente($params)
        {
            $db = new DB();

            $prepare = $db->prepare("CALL sp_cargahoraria_introductorio_save(:idperiodo, :idcarrera, :idmateria_introductorio, :iddocente)");

            return $prepare->execute($params);
        }

        public static function findDocenteIdMateriaintroductorio($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_carga_horaria_introductorio 
                                    WHERE idperiodo = :idperiodo 
                                    AND idcarrera = :idcarrera
                                    AND idmateria_introductorio = :idmateria_introductorio
                                    AND iddocente = :iddocente");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cargahorariaintroductorio::class);
        }

    }

?>