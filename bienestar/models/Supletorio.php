<?php    

    class Supletorio extends DB
    {
        public $idmatricula;
        public $idperiodo;
        public $idcarrera;
        public $idseccion;
        public $modalidad;
        public $idnivel;
        public $idmateria;
        public $idparcial;
        public $aporte;
        public $lecciones;
        public $tdocencia;
        public $practica;
        public $aprendizaje;
        public $taprendizaje;
        public $tpractica;
        public $resultado;
        public $tresultado;
        public $total;

        public static function viewListaEstudianteMateria($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel, $idmateria)
        {
            $db = new DB();
            //$prepare = $db->prepare("call sp_estudiante_materia(:idperiodo, :idcarrera, :idseccion, :modalidad, :idnivel, :idmateria);");
            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                    FROM tb_matricula M 
                                    INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    INNER JOIN tb_detalle_matricula D ON M.idmatricula = D.idmatricula
                                    INNER JOIN tb_materia T ON D.idmateria = T.idmateria
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idcarrera = :idcarrera
                                    AND M.idseccion = :idseccion
                                    AND M.modalidad = :modalidad
                                    AND T.idmateria = :idmateria
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
            
            //$prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idseccion" => $idseccion, ":modalidad" => $modalidad, ":idnivel" => $idnivel, ":idmateria" => $idmateria]);
            $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idseccion" => $idseccion, ":modalidad" => $modalidad, ":idmateria" => $idmateria]);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacion::class);
        }

        public function validafecha(){
            $db = new DB();
            $prepare = $db->prepare("SELECT * FROM tb_configuracion_calificaciones WHERE idperiodo = 6 AND idparcial = 1");
            $prepare->execute();
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacion::class);
        }

        public function insertSupletorio($params)
        {
            $db = new DB();

            $prepare = $db->prepare("UPDATE tb_calificacion SET supletorio = :supletorio
                                        WHERE idmatricula = :idmatricula 
                                        AND idperiodo = :idperiodo 
                                        AND idcarrera = :idcarrera 
                                        AND idseccion = :idseccion 
                                        AND modalidad = :modalidad 
                                        AND idnivel = :idnivel 
                                        AND idmateria = :idmateria
                                        AND idparcial = 2;");
            return $prepare->execute($params);
        }

        public static function findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_estudiante_calificacion_materia(:idmatricula, :idperiodo, :idmateria, :idparcial);");
            $prepare->execute([":idmatricula" => $idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idparcial" => $idparcial]);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacion::class);
        }

        public static function findcalificaciontotal($idmatricula, $idperiodo, $idmateria)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT total FROM tb_calificacion WHERE idmatricula = :idmatricula AND idperiodo = :idperiodo AND idmateria = :idmateria");
            $prepare->execute([":idmatricula" => $idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacion::class);
        }
    }

?>