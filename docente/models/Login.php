<?php
class Login extends DB
{
    // public $idusuario;
    // public $usuario;
    // public $nombres;
    // public $tipousuario;
    // public $contrasena;

    public static function loginusuario($usuario, $contrasena)
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_docente_login(:usuario, :contrasena)");
        $prepare->execute([":usuario" => $usuario, ":contrasena" => $contrasena]);

        return $prepare->fetchAll(PDO::FETCH_CLASS, Login::class);
    }

}