<?php

  class Periodo extends DB
  {
    public $idperiodo;
    public $periodo;
    public $fechainicio;
    public $fechafin;

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_periodo_select_activo();");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
    }

    public static function findTodos()
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_periodo ORDER BY fechainicio;");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
    }
    
    public static function findActivo()
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_periodo_select_activo();");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Periodo::class);
    }

    public function insertPeriodo()
    {
      $params = [":periodo" => $this->periodo, ":fechainicio" => $this->fechainicio, ":fechafin" => $this->fechafin];

      $prepare = $this->prepare("call sp_periodo_insert(:periodo, :fechainicio, :fechafin);");
      $prepare->execute($params);
    }
  
  }  

?>