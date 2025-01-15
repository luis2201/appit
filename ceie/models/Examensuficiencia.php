<?php

    class Examensuficiencia extends DB
    {
        public static function validaInscripcion($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_examen_suficiencia WHERE idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Examensuficiencia::class);
        }

        public static function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_examen_suficiencia(idperiodo, idmatricula) VALUES(:idperiodo, :idmatricula)");
            
            return $prepare->execute($params);            
        }

        public static function ViewListaEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT E.idexamen_suficiencia, CONCAT(S.apellido1,' ',S.apellido2,' ',S.nombre1,' ',S.nombre2) AS estudiante, E.calificacion
                                    FROM tb_examen_suficiencia E 
                                        INNER JOIN tb_matricula M ON E.idmatricula = M.idmatricula
                                        INNER JOIN tb_estudiante S ON M.idestudiante = S.idestudiante
                                    WHERE E.idperiodo = :idperiodo
                                    ORDER BY S.apellido1, S.apellido2, S.nombre1, S.nombre2;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Examensuficiencia::class);
        }

        public static function Save($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_examen_suficiencia SET calificacion = :calificacion WHERE idexamen_suficiencia = :idexamen_suficiencia");
            
            return $prepare->execute($params);            
        }
    }

?>