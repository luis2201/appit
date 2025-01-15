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

        public static function findEstudiante($idperiodo, $idcarrera, $modalidad, $idnivel)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1, space(1), E.apellido2, space(1), E.nombre1, space(1), E.nombre2)AS alumnos, E.numero_identificacion, E.fecha_nacimiento, E.tipo_sangre, E.numero_celular, E.doc_cedula, E.doc_titulo
                                    FROM tb_matricula M
                                    INNER JOIN tb_estudiante E ON M.idestudiante=E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    AND M.modalidad = :modalidad
                                    AND M.idnivel = :idnivel
                                    AND M.estado = 1
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":modalidad" => $modalidad, ":idnivel" => $idnivel]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneral::class);
        }

        public static function findnotasIDEstudiante($idperiodo, $idmateria, $idparcial, $idmatricula)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_calificaciones_estudiante_general(:idperiodo, :idmateria, :idparcial, :idmatricula);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idparcial" => $idparcial, ":idmatricula" => $idmatricula]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneral::class);
        }

        public static function findnotasIDEstudianteVirtual($idperiodo, $idmateria, $idparcial, $idmatricula)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_calificaciones_estudiante_general_virtual(:idperiodo, :idmateria, :idparcial, :idmatricula);");
            $prepare->execute([":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idparcial" => $idparcial, ":idmatricula" => $idmatricula]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cuadrogeneral::class);
        }
    }

?>
