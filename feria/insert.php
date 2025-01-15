<?php 

    require 'class/DB.php';

    $db = new DB();
    $params = [":idstand" => $_POST["idstand"], ":visitantes" => $_POST["num"]];

    $prepare = $db->prepare("UPDATE tb_stand SET visitantes = visitantes + :visitantes WHERE idstand = :idstand;");
    $prepare->execute($params);
    
    $resp = $prepare->fetchAll(PDO::FETCH_CLASS);

    echo '<script>
            alert("Se agregaron los participantes al Stand satisfactoriamente");
            location.href = "totales.php";
    </script>';

?>