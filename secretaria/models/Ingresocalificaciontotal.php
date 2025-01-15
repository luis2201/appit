<?php

  class Ingresocalificaciontotal extends DB
  {
    public $idmatricula;
    public $idperiodo;
    public $idcarrera;    
    public $idnivel;
    public $idmateria;
    public $p1;
    public $p2;
    public $sup;
    public $total;

    public static function viewListaEstudianteMateria($idperiodo, $idmateria)
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1,' ', E.apellido2,' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                FROM tb_detalle_matricula D
                                INNER JOIN tb_matricula M ON D.idmatricula = M.idmatricula
                                INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                WHERE M.idperiodo = :idperiodo                                
                                AND D.idmateria = :idmateria
                                AND M.modalidad = 'Presencial'
                                AND M.estado = 1
                                ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2;");
        $prepare->execute([":idperiodo" => $idperiodo, ":idmateria" => $idmateria]);

        return $prepare->fetchAll(PDO::FETCH_CLASS, Ingresocalificacion::class);
    }

    public function validafecha(){
        $db = new DB();
        $prepare = $db->prepare("SELECT * FROM tb_configuracion_calificaciones WHERE idperiodo = 6 AND idparcial = 1");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS, Ingresocalificacion::class);
    }

    public function insertCalificacion()
    {
        $params = [":idmatricula" => $this->idmatricula, ":idperiodo" => $this->idperiodo, ":idcarrera" => $this->idcarrera, ":idnivel" => $this->idnivel, ":idmateria" => $this->idmateria, ":idparcial" => 1, ":p1" => $this->p1];
        $prepare = $this->prepare("call sp_calificacion_total_insert_update(:idmatricula, :idperiodo, :idcarrera, :idnivel, :idmateria, :idparcial, :p1);");
        $prepare->execute($params);

        $params = [":idmatricula" => $this->idmatricula, ":idperiodo" => $this->idperiodo, ":idcarrera" => $this->idcarrera, ":idnivel" => $this->idnivel, ":idmateria" => $this->idmateria, ":idparcial" => 2, ":p2" => $this->p2];
        $prepare = $this->prepare("call sp_calificacion_total_insert_update(:idmatricula, :idperiodo, :idcarrera, :idnivel, :idmateria, :idparcial, :p2);");
        $prepare->execute($params);
        
        $params = [":idmatricula" => $this->idmatricula, ":idperiodo" => $this->idperiodo, ":idcarrera" => $this->idcarrera, ":idnivel" => $this->idnivel, ":idmateria" => $this->idmateria, ":sup" => $this->sup];
        $prepare = $this->prepare("UPDATE tb_calificacion SET supletorio = :sup
                                        WHERE idmatricula = :idmatricula 
                                        AND idperiodo = :idperiodo 
                                        AND idcarrera = :idcarrera 
                                        AND idnivel = :idnivel 
                                        AND idmateria = :idmateria
                                        AND idparcial = 2;");
        $prepare->execute($params);
    }

    public static function findCalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial)
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * FROM tb_calificacion WHERE idmatricula = :idmatricula AND idperiodo = :idperiodo AND idmateria = :idmateria AND idparcial = :idparcial;");
        $prepare->execute([":idmatricula" => $idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idparcial" => $idparcial]);

        return $prepare->fetchAll(PDO::FETCH_CLASS, Ingresocalificaciontotal::class);
    }
  }

?>