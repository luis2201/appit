<?php

    class Reporteasistencia
    {
        public static function viewListaEstudianteMateria($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante, E.numero_identificacion
                                    FROM tb_matricula M 
                                        INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                        INNER JOIN tb_detalle_matricula D ON M.idmatricula = D.idmatricula
                                        INNER JOIN tb_materia T ON D.idmateria = T.idmateria
                                        INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo                                
                                    AND T.idmateria = :idmateria
                                    AND E.validacion = 0
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");                
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Reporteasistencia::class);
        }

        public static function findHorasClase($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT fecha
                                    FROM tb_asistencia 
                                    WHERE idperiodo = :idperiodo
                                    AND idmateria = :idmateria
                                    GROUP BY fecha");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Reporteasistencia::class);
        }

        public function findAsistenciaEstudianteMateria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_asistencia WHERE idmateria = :idmateria AND idmatricula = :idmatricula");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Reporteasistencia::class);
        }

        public static function findFaltasFecha($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_asistencia WHERE idmateria = :idmateria AND idmatricula = :idmatricula AND asistencia < 100");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Reporteasistencia::class);
        }
    }

?>