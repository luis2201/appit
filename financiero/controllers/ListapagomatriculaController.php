<?php

  class ListapagomatriculaController
  {

   public function index()
   {    
    $pagos = Listapagomatricula::findAll();
    view('listapagomatricula.index', ["pagos" => $pagos]);
   }

   public function selectall()
   {
    
   }

 }

?>