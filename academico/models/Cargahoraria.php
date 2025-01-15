<?php 

    class Cargahoraria extends DB
    {
        public $idcarga_horaria;
        public $iddocente;
        public $idperiodo;
        public $iddetalle_cargahoraria;
        public $idcarrera;
        public $idnivel;
        public $idmateria;
        public $idseccion;
        public $idmodalidad;
        public $horas;
    
        public function insertCarga()
        {
            $params = [":iddocente" => $this->iddocente, ":idperiodo" => $this->idperiodo, "idcarrera" => $this->idcarrera, "idnivel" => $this->idnivel, "idmateria" => $this->idmateria, "idseccion" => $this->idseccion, "modalidad" => $this->modalidad, "horas" => $this->horas];
      
            $prepare = $this->prepare("call sp_carga_horaria_insert(:iddocente, :idperiodo, :idcarrera, :idnivel, :idmateria, :idseccion, :modalidad, :horas);");
            $prepare->execute($params);
        }   

        public static function validaCarga($iddocente, $idperiodo, $idcarrera, $idnivel, $idmateria, $idseccion, $modalidad)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_detalle_cargahoraria_idmateria(:iddocente, :idperiodo, :idcarrera, :idnivel, :idmateria, :idseccion, :modalidad);");
            $prepare->execute([":iddocente" => $iddocente, ":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel, ":idmateria" => $idmateria, ":idseccion" => $idseccion, ":modalidad" => $modalidad]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cargahoraria::class);
        }

        public static function findCargaDocente($iddocente, $idperiodo)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_carga_horaria_iddocente(:iddocente, :idperiodo);");
            $prepare->execute([":iddocente" => $iddocente, ":idperiodo" => $idperiodo]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cargahoraria::class);
        }

        public static function totalHorasDocente($iddocente, $idperiodo)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_total_horas_docente(:iddocente, :idperiodo);");
            $prepare->execute([":iddocente" => $iddocente, ":idperiodo" => $idperiodo]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Cargahoraria::class);
        }

        public static function deletecargahoraria($params)
        {
            $db = new DB();

            $prepare = $db->prepare("DELETE FROM tb_detalle_cargahoraria WHERE iddetalle_cargahoraria = :iddetalle_cargahoraria;");
            
            return $prepare->execute($params);
        }

    }
        