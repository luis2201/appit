<?php
class Login extends DB
{
    public $idadmisiones;
    public $numero_identificacion;
    public $nombre1;
    public $apellido1;

    public static function loginadmisiones($correo_electronico, $contrasena)
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_admisiones_login(:correo_electronico, :contrasena)");
        $prepare->execute([":correo_electronico" => $correo_electronico, ":contrasena" => $contrasena]);

        return $prepare->fetchObject(Login::class);
    }

}