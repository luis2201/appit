<?php

  class ViewmensajeController
  {

    public function index()
    {
      $url= explode("?",$_SERVER["REQUEST_URI"]);  
      $idmensaje = $url[1];
      
      $mensajes = Mensajeria::viewMensaje($idmensaje);

      view("viewmensaje.index", ["mensajes" => $mensajes]);
    }

  }

?>