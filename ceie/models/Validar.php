<?php

    class Validar extends DB
    {
        public static function findSolicitud($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT C.idceie, CONCAT(E.apellido1,' ', E.apellido2,' ', E.nombre1,' ', E.nombre2)AS estudiante, C.idmodulo, C.estado 
                                     FROM tb_ceie C 
                                     INNER JOIN tb_matricula M ON C.idmatricula = M.idmatricula
                                     INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                     INNER JOIN tb_periodo P ON C.idperiodo = P.idperiodo 
                                     WHERE C.idperiodo = :idperiodo 
                                     AND C.idmodulo = :idmodulo
                                     ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Validar::class);
        }

        public static function Aprobar($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_ceie SET estado = 'INSCRITO' WHERE idceie = :idceie");
            
            return $prepare->execute($params);
        }

        public static function Eliminar($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_ceie WHERE idceie = :idceie");
            
            return $prepare->execute($params);
        }

    }

?>