<?php

    class Cuadrogeneralenlinea extends DB
    {
        public static function findMaterias($idperiodo, $idcarrera, $idnivel)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_materias_carrera_nivel(:idperiodo, :idcarrera, :idnivel);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneralenlinea::class);
        }

        public static function findEstudiantes($idperiodo, $idcarrera, $idnivel)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_lista_carreras_enlinea_niveles_ID(:idperiodo, :idcarrera, :idnivel);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneralenlinea::class);
        }

        public static function findnotasIDEstudiante($idperiodo, $idmateria, $idmatricula)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_calificaciones_estudiante_enlinea_general(:idperiodo, :idmateria, :idmatricula);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idmatricula" => $idmatricula]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneralenlinea::class);
        }
    }

?>
