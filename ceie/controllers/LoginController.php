<?php

class LoginController
{
  public function index()
  {
    view('login.index', []);
  }

  public function validar()
  {
    $usuario = Main::limpiar_cadena($_POST['usuario']);
    $contrasena = Main::limpiar_cadena($_POST['contrasena']);
    $contrasena = Main::encryption($contrasena);

    $resp = Login::loginusuario($usuario, $contrasena);

    if (!empty($resp)) {
      foreach($resp as $row){
        $_SESSION['idusuario_ceie'] = $row->idusuario;
        $_SESSION['usuario_ceie'] = $row->usuario;
        $_SESSION['nombres_ceie'] = $row->nombres;
        $_SESSION['tipousuario_ceie'] = $row->tipousuario;
      }
    } 
      
    echo json_encode($resp);

  }
}
