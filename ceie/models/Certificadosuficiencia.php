<?php 

    class Certificadosuficiencia extends DB
    {
        public static function findEstudianteIdMatricula($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT CONCAT(S.apellido1,' ',S.apellido2,' ',S.nombre1,' ',S.nombre2)AS estudiante, E.calificacion
                                    FROM tb_examen_suficiencia E 
                                        INNER JOIN tb_matricula M ON E.idmatricula = M.idmatricula
                                        INNER JOIN tb_estudiante S ON M.idestudiante = S.idestudiante
                                    WHERE M.idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Certificadosuficiencia::class);
        }
    }

?>