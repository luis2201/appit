<?php

  class ListapagoadmisionesController
  {

   public function index()
   {    
    $pagos = Listapagoadmisiones::findAll();
    view('listapagoadmisiones.index', ["pagos" => $pagos]);
   }

   public function selectall()
   {
    
   }

 }

?>