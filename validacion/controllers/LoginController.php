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
    
    $resp = Login::loginestudiante($correo_electronico, $contrasena);

    if (!empty($resp)) {
      $logins = new Login();
      $idestudiante = Main::encryption($resp->idestudiante);
      $logins->idestudiante = $idestudiante;
      $logins->numero_identificacion = $resp->numero_identificacion;
      $logins->nombres = $resp->nombre1.' '.$resp->apellido1.' '.$resp->apellido2;

      $_SESSION['idestudiantevali_appit'] = $logins->idestudiante;
      $_SESSION['numeroidentificacionvali_appit'] = $logins->numero_identificacion;
      $_SESSION['nombresvali_appit'] = $logins->nombres;

      echo json_encode($logins);
    } else {
      echo json_encode($resp);
    }

  }
}
