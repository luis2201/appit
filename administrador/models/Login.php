<?php
class Login extends DB
{
    public $idusuario;
    public $usuario;
    public $nombres;

    public static function loginusuario($usuario, $contrasena)
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_usuario_login(:usuario, :contrasena)");
        $prepare->execute([":usuario" => $usuario, ":contrasena" => $contrasena]);

        return $prepare->fetchObject(Login::class);
    }

}