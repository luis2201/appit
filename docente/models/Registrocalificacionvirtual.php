<?php

    class Registrocalificacionvirtual extends DB
    {
        public $idmatricula;
        public $idperiodo;
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
        
        public static function Save($params)
        {
            $db = new DB();

            $prepare = $db->prepare("call sp_calificacion_virtual_save(:idperiodo, :idmatricula, :idcarrera, :idnivel, :idmateria, :aporte, :lecciones, :tdocencia, :practica, :tpractica, :aprendizaje, :taprendizaje, :resultado, :tresultado, :total);");
            
            return $prepare->execute($params);
        }
        //No mostrar los de validacion y los del introductorio
        public static function viewListaEstudianteMateria($idperiodo, $idmateria)
        {
            $db = new DB();
            //$prepare = $db->prepare("call sp_estudiante_materia(:idperiodo, :idcarrera, :idseccion, :modalidad, :idnivel, :idmateria);");
            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                    FROM tb_matricula M 
                                    INNER JOIN tb_detalle_matricula D ON M.idmatricula = D.idmatricula
                                    INNER JOIN tb_materia T ON D.idmateria = T.idmateria
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND T.idmateria = :idmateria
                                    AND E.validacion = 0
                                    AND E.introductorio = 0
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
                        
            $prepare->execute([":idperiodo" => $idperiodo, ":idmateria" => $idmateria]);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacionvirtual::class);
        }

        public function insertCalificacion()
        {
            $params = [":idmatricula" => $this->idmatricula, ":idperiodo" => $this->idperiodo, ":idmateria" => $this->idmateria, ":idparcial" => $this->idparcial, ":aporte" => $this->aporte, ":lecciones" => $this->lecciones, ":tdocencia" => $this->tdocencia, ":practica" => $this->practica, ":tpractica" => $this->tpractica, ":aprendizaje" => $this->aprendizaje, ":taprendizaje" => $this->taprendizaje, ":resultado" => $this->resultado, ":tresultado" => $this->tresultado, ":total" => $this->total];
      
            $prepare = $this->prepare("call sp_calificacion_virtual_save(:idperiodo, :idmatricula, :idmateria, :idparcial, :aporte, :lecciones, :tdocencia, :practica, :tpractica, :aprendizaje, :taprendizaje, :resultado, :tresultado, :total);");
            
            return $prepare->execute($params);
        }

        public static function findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_estudiante_calificacion_virtual_materia(:idmatricula, :idperiodo, :idmateria, :idparcial);");
            $prepare->execute([":idmatricula" => $idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idparcial" => $idparcial]);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacionvirtual::class);
        }
    }

?>