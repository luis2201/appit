<?php

class LoginController
{
  public function index()
  {
    view('login.index', []);
  }

  public function validar()
  {
    $correo_electronico = Main::limpiar_cadena($_POST['correo_electronico']);
    $contrasena = Main::limpiar_cadena($_POST['contrasena']);
    $contrasena = Main::encryption($contrasena);
    
    $resp = Login::loginadmisiones($correo_electronico, $contrasena);

    if (!empty($resp)) {
      $logins = new Login();
      $idadmisiones = Main::encryption($resp->idadmisiones);
      $logins->idadmisiones = $idadmisiones;
      $logins->numero_identificacion = $resp->numero_identificacion;
      $logins->nombres = $resp->nombre1.' '.$resp->apellido1.' '.$resp->apellido2;

      $_SESSION['idadmisiones_appit'] = $logins->idadmisiones;
      $_SESSION['numeroidentificacion_appit'] = $logins->numero_identificacion;
      $_SESSION['nombres_appit'] = $logins->nombres;

      echo json_encode($logins);
    } else {
      echo json_encode($resp);
    }
  }
}
