<?php
class Register extends DB
{

  public $tipo_identificacion;
  public $numero_identificacion;
  public $apellido1;
  public $apellido2;
  public $nombre1;
  public $nombre2;
  public $correo_electronico;
  public $contrasena;

  public static function findidentificacion($numero_identificacion)
  {
    $db = new DB();
    $prepare = $db->prepare("call sp_estudiante_select_identificacion(:numero_identificacion)");
    $prepare->execute([":numero_identificacion" => $numero_identificacion]);

    return $prepare->fetchObject(Register::class);
  }

  public static function findcorreo($correo_electronico)
  {
    $db = new DB();
    $prepare = $db->prepare("call sp_estudiante_select_correo(:correo_electronico)");
    $prepare->execute([":correo_electronico" => $correo_electronico]);

    return $prepare->fetchObject(Register::class);
  }

  public function insert()
  {
      $params = [":tipo_identificacion" => $this->tipo_identificacion, ":numero_identificacion" => $this->numero_identificacion, ":apellido1" => $this->apellido1, ":apellido2" => $this->apellido2, ":nombre1" => $this->nombre1, ":nombre2" => $this->nombre2, ":correo_electronico" => $this->correo_electronico, ":contrasena" => $this->contrasena];
      
      $prepare = $this->prepare("call sp_estudiante_register(:tipo_identificacion, :numero_identificacion, :apellido1, :apellido2, :nombre1, :nombre2, :correo_electronico, :contrasena)");
      $prepare->execute($params);
  }

  public static function findvotante($correo_electronico, $contrasena)
  {
      $db = new DB();
      $prepare = $db->prepare("call sp_login_votante(:correo_electronico, :contrasena)");
      $prepare->execute([":correo_electronico" => $correo_electronico, ":contrasena" => $contrasena]);

      return $prepare->fetchObject(Login::class);
  }

}