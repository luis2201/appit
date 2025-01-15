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
      $logins->foto = $resp->foto;
      
      $_SESSION['idestudiante_appit'] = $logins->idestudiante;
      $_SESSION['numeroidentificacion_appit'] = $logins->numero_identificacion;
      $_SESSION['nombres_appit'] = $logins->nombres;
      $_SESSION['foto_appit'] = $logins->foto;

      echo json_encode($logins);
    } else {
      echo json_encode($resp);
    }

  }
}
