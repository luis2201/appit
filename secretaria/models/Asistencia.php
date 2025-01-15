<?php 

    class Asistencia extends DB
    {
        public function findAsistenciaEstudianteMateria($idmateria, $idmatricula)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_asistencia WHERE idmateria = :idmateria AND idmatricula = :idmatricula");
            $prepare->execute([":idmateria" => $idmateria, ":idmatricula" => $idmatricula]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asistencia::class);
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

            return $prepare->fetchAll(PDO::FETCH_CLASS, Asistencia::class);
        }
    }

?>