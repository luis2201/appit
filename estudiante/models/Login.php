<?php
class Login extends DB
{
    public $idestudiante;
    public $numero_identificacion;
    public $nombre1;
    public $apellido1;
    public $foto;

    public static function loginestudiante($correo_electronico, $contrasena)
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_estudiante_login(:correo_electronico, :contrasena)");
        $prepare->execute([":correo_electronico" => $correo_electronico, ":contrasena" => $contrasena]);

        return $prepare->fetchObject(Login::class);
    }

}