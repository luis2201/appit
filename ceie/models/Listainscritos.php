<?php

    class Listainscritos extends DB
    {
        public static function findModulo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.idceie, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante, C.idmodulo, P.periodo 
                                    FROM tb_ceie C 
                                    INNER JOIN tb_matricula M ON M.idmatricula = C.idmatricula
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    INNER JOIN tb_periodo P ON C.idperiodo = P.idperiodo 
                                    WHERE C.idperiodo = :idperiodo 
                                    AND C.idmodulo = :idmodulo
                                    AND C.estado = 'INSCRITO'
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Listainscritos::class);
        }
    }

?>