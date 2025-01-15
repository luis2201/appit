<?php

    class Cuadrodocente extends DB
    {
        public static function viewListaEstudianteMateria($idperiodo, $idmateria)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                    FROM tb_matricula M 
                                    INNER JOIN tb_detalle_matricula D ON M.idmatricula = D.idmatricula
                                    INNER JOIN tb_materia T ON D.idmateria = T.idmateria
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND T.idmateria = :idmateria
                                    AND E.validacion = 0
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute([":idperiodo" => $idperiodo, ":idmateria" => $idmateria]);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrodocente::class);
        }

        public static function findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_estudiante_calificacion_materia(:idmatricula, :idperiodo, :idmateria, :idparcial);");
            $prepare->execute([":idmatricula" => $idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idparcial" => $idparcial]);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrodocente::class);
        }
    }
?>