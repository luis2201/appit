<?php

    class Tutor extends DB
    {
        public $idtutor;
        public $idperiodo;
        public $iddocente;
        public $idcarrera;
        public $idnivel;
        public $idseccion;
        public $modalidad;

        public static function findAll($idperiodo)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_tutor_select_all(:idperiodo);");
            $prepare->execute([":idperiodo" => $idperiodo]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Tutor::class);
        }

        public function insertTutor()
        {
            $params = [":idperiodo" => $this->idperiodo, ":iddocente" => $this->iddocente, ":idcarrera" => $this->idcarrera, ":idnivel" => $this->idnivel, ":idseccion" => $this->idseccion, ":modalidad" => $this->modalidad];
            
            $prepare = $this->prepare("call sp_tutor_insert(:idperiodo, :iddocente, :idcarrera, :idnivel, :idseccion, :modalidad);");
            $prepare->execute($params);
        }
    }

?>