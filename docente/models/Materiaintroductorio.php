<?php 

    class Materiaintroductorio extends DB
    {
        public function findMateriaIdDocente($params)
        {
            $db = new DB();

            $prepare =  $db->prepare("SELECT M.idmateria, M.materia
                                        FROM tb_carga_horaria_introductorio C
                                            INNER JOIN tb_materia_introductorio M ON C.idmateria_introductorio = M.idmateria
                                        WHERE C.idperiodo = :idperiodo
                                        AND C.idcarrera = :idcarrera
                                        AND C.iddocente = :iddocente");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Calificacionintroductorio::class);
        }
    }