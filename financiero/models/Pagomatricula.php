<?php

  class Pagomatricula extends DB
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
      $prepare = $db->prepare("call sp_estudiante_select_identificacion(:numero_identificacion)");
      $prepare->execute([":numero_identificacion" => $numero_identificacion]);

      return $prepare->fetchObject(Pagomatricula::class);
    }

    public static function findcorreo($correo_electronico)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_estudiante_select_correo(:correo_electronico)");
      $prepare->execute([":correo_electronico" => $correo_electronico]);
  
      return $prepare->fetchObject(Pagomatricula::class);
    }

    public function insert()
    {
      $params = [":tipo_identificacion" => $this->tipo_identificacion, ":numero_identificacion" => $this->numero_identificacion, ":apellido1" => $this->apellido1, ":apellido2" => $this->apellido2, ":nombre1" => $this->nombre1, ":nombre2" => $this->nombre2, ":correo_electronico" => $this->correo_electronico, ":contrasena" => $this->contrasena];
      
      $prepare = $this->prepare("call sp_estudiante_register(:tipo_identificacion, :numero_identificacion, :apellido1, :apellido2, :nombre1, :nombre2, :correo_electronico, :contrasena)");
      $prepare->execute($params);
    }  

    public static function findpagoMatricula($idestudiante, $idperiodo)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_pagomatricula_select_estudianteId(:idestudiante, :idperiodo)");
      $prepare->execute([":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo]);

      return $prepare->fetchObject(Pagomatricula::class);
    }

    public static function insertPago($idestudiante, $idperiodo, $tipo_matricula, $valor_pagar, $fecha_pago, $numero_factura, $valorpago)
    {
      $db = new DB();
      $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo, ":tipo_matricula" => $tipo_matricula, ":valor_pagar" => $valor_pagar, ":fecha_pago" => $fecha_pago, ":numero_factura" => $numero_factura, ":valorpago" => $valorpago];
      
      $prepare = $db->prepare("call sp_pagomatricula_register(:idestudiante, :idperiodo, :tipo_matricula, :valor_pagar, :fecha_pago, :numero_factura, :valorpago)");
      return $prepare->execute($params);
    }

    public static function insertMatricula($idestudiante, $idperiodo, $idnivel, $idcarrera, $idseccion, $modalidad)
    {
      $db = new DB();
      $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo, ":idnivel" => $idnivel, ":idcarrera" => $idcarrera, ":idseccion" => $idseccion, ":modalidad" => $modalidad];
      
      $prepare = $db->prepare("call sp_matricula_insert(:idestudiante, :idperiodo, :idnivel, :idcarrera, :idseccion, :modalidad)");
      return $prepare->execute($params);
    }

  }
  
?>
