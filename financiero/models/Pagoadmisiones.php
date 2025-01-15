<?php

  class Pagoadmisiones extends DB
  {
    public $tipo_identificacion;
    public $numero_identificacion;
    public $apellido1;
    public $apellido2;
    public $nombre1;
    public $nombre2;
    public $correo_electronico;
    public $contrasena;    

    
    public static function findidentificacion($numero_identificacion)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_admision_select_identificacion(:numero_identificacion)");
      $prepare->execute([":numero_identificacion" => $numero_identificacion]);

      return $prepare->fetchObject(Pagoadmisiones::class);
    }

    public static function findcorreo($correo_electronico)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_admision_select_correo(:correo_electronico)");
      $prepare->execute([":correo_electronico" => $correo_electronico]);
  
      return $prepare->fetchObject(Pagoadmisiones::class);
    }

    public function insert()
    {
      $params = [":tipo_identificacion" => $this->tipo_identificacion, ":numero_identificacion" => $this->numero_identificacion, ":apellido1" => $this->apellido1, ":apellido2" => $this->apellido2, ":nombre1" => $this->nombre1, ":nombre2" => $this->nombre2, ":correo_electronico" => $this->correo_electronico, ":contrasena" => $this->contrasena];
      
      $prepare = $this->prepare("call sp_admision_register(:tipo_identificacion, :numero_identificacion, :apellido1, :apellido2, :nombre1, :nombre2, :correo_electronico, :contrasena)");
      
      return $prepare->execute($params);
    }  

    public static function findpagoAdmisiones($idadmisiones, $idperiodo)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_pagoadmision_select_admisionesId(:idadmisiones, :idperiodo)");
      $prepare->execute([":idadmisiones" => $idadmisiones, ":idperiodo" => $idperiodo]);

      return $prepare->fetchObject(Pagoadmisiones::class);
    }

    public static function insertPago($idadmisiones, $idperiodo, $valorpagar, $fechapago, $numerofactura, $valorpago)
    {
      $db = new DB();
      $params = [":idadmisiones" => $idadmisiones, ":idperiodo" => $idperiodo, ":valorpagar" => $valorpagar, ":fechapago" => $fechapago, ":numerofactura" => $numerofactura, ":valorpago" => $valorpago];
      
      $prepare = $db->prepare("call sp_pagoadmision_register(:idadmisiones, :idperiodo, :valorpagar, :fechapago, :numerofactura, :valorpago)");
      $prepare->execute($params);
    }

  }

?>