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
      foreach($resp as $row){
        $logins = new Login();
        $idestudiante = Main::encryption($row->idestudiante);
        $logins->idestudiante = $idestudiante;
        $logins->numero_identificacion = $row->numero_identificacion;
        $logins->nombres = $row->nombre1.' '.$row->apellido1.' '.$row->apellido2;
      }
      $_SESSION['idestudiante_appit'] = $logins->idestudiante;
      $_SESSION['numeroidentificacion_appit'] = $logins->numero_identificacion;
      $_SESSION['nombres_appit'] = $logins->nombres;

      echo json_encode(true);
    } else {
      echo json_encode(false);
    }
    
    echo json_encode($logins);
  }
}
