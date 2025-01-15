<?php
  
  class Inscripcion extends DB
  {
    public $idadmisiones;
    public $idperiodo;
    public $idcarrera;
    public $modalidad;

    public static function find($params)
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_detalleadmision_select_idadmision(:idadmisiones, :idperiodo)");
        $prepare->execute($params);

        return $prepare->fetchAll(PDO::FETCH_CLASS, Inscripcion::class);
    }

    public function insert()
    { 
        $params = [":idadmisiones" => $this->idadmisiones, ":idperiodo" => $this->idperiodo,  ":idcarrera" => $this->idcarrera, ":modalidad" => $this->modalidad];
        
        $prepare = $this->prepare("call sp_detalleadmision_insert(:idadmisiones, :idperiodo, :idcarrera, :modalidad)");
        $prepare->execute($params);
    }

  }
  
?>