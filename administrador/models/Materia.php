<?php

    class Materia extends DB
    {
        public static function findAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_materia ORDER BY codigo;");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public static function findListaMateriaAll()
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT 
                                        t1.idmateria,
                                        t1.codigo,
                                        t1.materia,
                                        t1.idconcatenada,
                                        CONCAT(t2.codigo,' ', t2.materia) AS materia_concatenada,
                                        t1.creditos,
                                        t1.estado
                                    FROM 
                                        tb_materia t1
                                    LEFT JOIN 
                                        tb_materia t2 ON t1.idconcatenada = t2.idmateria");
            $prepare->execute();

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public static function findMateriaIdCarrera($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT T.idmateria, T.codigo, T.materia, N.nivel
                                    FROM tb_malla M
                                        INNER JOIN tb_materia T ON M.idmateria = T.idmateria
                                        INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    ORDER BY T.codigo");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public static function findMateriaIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_detalle_matricula 
                                    WHERE idmatricula = :idmatricula
                                    AND idmateria = :idmateria");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Materia::class);
        }

        public static function insertMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_materia(codigo, materia, idconcatenada, creditos)
                                     VALUES(:codigo, :materia, :idconcatenada, :creditos)");
            
            return $prepare->execute($params);
        }

        public static function insertConcatenada($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_materia SET idconcatenada = :idconcatenada
                                     WHERE idmateria = :idmateria");
            
            return $prepare->execute($params);
        }
    }

?>