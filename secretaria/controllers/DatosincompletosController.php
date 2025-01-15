<?php

  class DatosincompletosController 
  {
    public function index()
    {
      $datos = Datosincompletos::findAll();

      view("datosincompletos.index", ["datos" => $datos]);
    }
  }

?>