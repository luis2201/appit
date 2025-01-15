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
      $logins = new Login();
      $idusuario = Main::encryption($resp->idusuario);
      $logins->idusuario = $idusuario;
      $logins->usuario = $resp->usuario;
      $logins->nombres = $resp->nombres;
      $logins->tipousuario = $resp->tipousuario;
      
      $_SESSION['idusuario_appit'] = $logins->idusuario;
      $_SESSION['usuario_appit'] = $logins->usuario;
      $_SESSION['nombres_appit'] = $logins->nombres;
      $_SESSION['tipousuario_appit'] = $logins->tipousuario;

      echo json_encode($logins);
    } else {
      echo json_encode($resp);
    }
  }
}
