<?php

    require 'DB.php';

    if(isset($_POST["usuario"]) && isset($_POST["contrasena"])){
        $db = new DB();
        $params = [":usuario" => $_POST["usuario"], ":contrasena" => md5($_POST["contrasena"])];

        $prepare = $db->prepare("SELECT * FROM tb_usuario WHERE usuario = :usuario AND contrasena = :contrasena;");
        $prepare->execute($params);
        
        $resp = $prepare->fetchAll(PDO::FETCH_CLASS);
        if(count($resp)){
            foreach($resp as $row){
                session_start();
                
                $_SESSION["idusuario"] = $row->idusuario;
                $_SESSION["usuario"] = $row->usuario;
                $_SESSION["nombres"] = $row->nombres;
            }

            header("Location: ../dashboard.php");
        } else {
            echo '<script>
                    alert("Usuario y/o contraseña incorrectos");
                    location.href="../logout.php";
                  </script>';
        }
    } else {
        header("Location: ../logout.php");
    }
    
?>