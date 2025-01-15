<?php

    class Materiaintroductorio extends DB
    {
        public function findMateriaIdCarrera($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT * FROM tb_materia_introductorio WHERE idcarrera = :idcarrera");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiaintroductorio::class);
        }

        public function findMateriaIdMatricula($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT M.idmateria, M.materia
                                    FROM tb_detalle_matricula_introductorio D INNER JOIN tb_materia_introductorio M ON D.idmateria = M.idmateria
                                    WHERE D.idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiaintroductorio::class);
        }

        public function findIdMateriaPerfil($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT M.materia  
                                    FROM tb_perfil_introductorio PI 
                                        INNER JOIN tb_materia_introductorio MI ON PI.idmateria_introductorio = MI.idmateria
                                        INNER JOIN tb_materia M ON PI.idmateria = M.idmateria
                                    WHERE idmateria_introductorio =  :idmateria_introductorio");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiaintroductorio::class);
        }

        public function findMateriasIdCarrera($params)
        {
            $db = new DB();

            $prepare =  $db->prepare("SELECT M.idmateria, M.materia
                                        FROM tb_carga_horaria_introductorio C
                                            INNER JOIN tb_materia_introductorio M ON C.idmateria_introductorio = M.idmateria
                                        WHERE C.idperiodo = :idperiodo
                                        AND C.idcarrera = :idcarrera");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materiaintroductorio::class);
        }

    }