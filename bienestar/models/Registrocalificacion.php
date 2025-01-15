<?php    

    class Registrocalificacion extends DB
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

        public function insertCalificacion()
        {
            $params = [":idmatricula" => $this->idmatricula, ":idperiodo" => $this->idperiodo, ":idcarrera" => $this->idcarrera, ":idseccion" => $this->idseccion, ":modalidad" => $this->modalidad, ":idnivel" => $this->idnivel, ":idmateria" => $this->idmateria, ":idparcial" => $this->idparcial, ":aporte" => $this->aporte, ":lecciones" => $this->lecciones, ":tdocencia" => $this->tdocencia, ":practica" => $this->practica, ":tpractica" => $this->tpractica, ":aprendizaje" => $this->aprendizaje, ":taprendizaje" => $this->taprendizaje, ":resultado" => $this->resultado, ":tresultado" => $this->tresultado, ":total" => $this->total];
      
            $prepare = $this->prepare("call sp_calificacion_insert_update(:idmatricula, :idperiodo, :idcarrera, :idseccion, :modalidad, :idnivel, :idmateria, :idparcial, :aporte, :lecciones, :tdocencia, :practica, :tpractica, :aprendizaje, :taprendizaje, :resultado, :tresultado, :total);");
            $prepare->execute($params);
        }

        public static function findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_estudiante_calificacion_materia(:idmatricula, :idperiodo, :idmateria, :idparcial);");
            $prepare->execute([":idmatricula" => $idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idparcial" => $idparcial]);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacion::class);
        }
    }

?>