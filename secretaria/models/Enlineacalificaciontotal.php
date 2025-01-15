<?php

    class Enlineacalificaciontotal extends DB
    {
        public $idmatricula;
        public $idperiodo;
        public $idcarrera;    
        public $idnivel;
        public $idmateria;
        public $total;
        public $supletorio;
        public $final;
    
        public static function viewListaEstudianteMateria($idperiodo, $idmateria)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1,' ', E.apellido2,' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                    FROM tb_detalle_matricula D
                                    INNER JOIN tb_matricula M ON D.idmatricula = M.idmatricula
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo                                
                                    AND D.idmateria = :idmateria
                                    AND M.modalidad = 'Virtual'
                                    AND M.estado = 1
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2;");
            $prepare->execute([":idperiodo" => $idperiodo, ":idmateria" => $idmateria]);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Enlineacalificaciontotal::class);
        }
    
        public function insertCalificacion()
        {
            $params = [":idmatricula" => $this->idmatricula, ":idperiodo" => $this->idperiodo, ":idcarrera" => $this->idcarrera, ":idnivel" => $this->idnivel, ":idmateria" => $this->idmateria, ":total" => $this->total, ":supletorio" => $this->supletorio, ":final" => $this->final];
            $prepare = $this->prepare("call sp_calificacion_virtual_total_insert_update(:idmatricula, :idperiodo, :idcarrera, :idnivel, :idmateria, :total, :supletorio, :final);");
            
            return $prepare->execute($params);
        }
    
        public static function findCalificacionidmatricula($params)
        {
            $db = new DB();
            $prepare = $db->prepare("SELECT * FROM tb_calificacion_virtual WHERE idmatricula = :idmatricula AND idperiodo = :idperiodo AND idmateria = :idmateria");
            $prepare->execute($params);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Enlineacalificaciontotal::class);
        }
      }
    
    ?>