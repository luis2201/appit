<?php

    class Cuadrogeneral extends DB
    {
        public static function findMaterias($idperiodo, $idcarrera, $idnivel)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_materias_carrera_nivel(:idperiodo, :idcarrera, :idnivel);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneral::class);
        }

        public static function findEstudiantes($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_lista_carreras_niveles_ID(:idperiodo, :idcarrera, :idseccion, :modalidad, :idnivel);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idseccion" => $idseccion, ":modalidad" => $modalidad, ":idnivel" => $idnivel]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneral::class);
        }

        public static function findnotasIDEstudiante($idperiodo, $idmateria, $idparcial, $idmatricula)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_calificaciones_estudiante_general(:idperiodo, :idmateria, :idparcial, :idmatricula);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idparcial" => $idparcial, ":idmatricula" => $idmatricula]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneral::class);
        }
    }

?>
