<?php

  class ConfiguracionperiodoController
  {
    
    public function index()
    {
      view('configuracionperiodo.index', []);
    }

    public function insertperiodo()
    {
      $periodo = Main::limpiar_cadena($_POST['periodo']);
      $fechainicio = Main::limpiar_cadena($_POST['fechainicio']);
      $fechafin = Main::limpiar_cadena($_POST['fechafin']);

      // $periodos = new Periodo();
      // $periodos->periodo = $periodo;
      // $periodos->fechainicio = $fechainicio;
      // $periodos->fechafin = $fechafin;

      // $periodos->insertPeriodo();

      // echo json_encode($periodos);
    }

  }

?>