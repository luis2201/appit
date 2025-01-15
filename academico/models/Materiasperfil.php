<?php

    class Materiasperfil extends DB
    {

        public function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.carrera, I.materia AS materiaintroductorio, M.materia AS materiaperfil
                                    FROM tb_perfil_introductorio P 
                                        INNER JOIN tb_materia M ON P.idmateria = M.idmateria
                                        INNER JOIN tb_materia_introductorio I ON P.idmateria_introductorio = I.idmateria
                                        INNER JOIN tb_carrera C ON I.idcarrera = C.idcarrera");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiasperfil::class);
        }

        public function validaMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_perfil_introductorio 
                                    WHERE idmateria_introductorio <> :idmateria_introductorio 
                                    AND idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiasperfil::class);
        }

        public function compruebaMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_perfil_introductorio 
                                    WHERE idmateria_introductorio = :idmateria_introductorio 
                                    AND idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiasperfil::class);
        }

        public static function addPerfil($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_perfil_introductorio(idmateria_introductorio, idmateria)
                                     VALUES(:idmateria_introductorio, :idmateria)");
            return $prepare->execute($params);
        }

        public static function deletePerfil($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_perfil_introductorio
                                    WHERE idmateria_introductorio = :idmateria_introductorio 
                                    AND idmateria = :idmateria");
            return $prepare->execute($params);
        }
    }

?>