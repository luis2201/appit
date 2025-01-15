<?php

  class Mensajeria extends DB
  {

    public static function findAll($idestudiante)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_mensajeria_select_idestudiante(:idestudiante);");
      $prepare->execute(["idestudiante" => $idestudiante]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Mensajeria::class);
    }

    public static function viewMensaje($idmensaje)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_mensajeria_select_idmensaje(:idmensaje);");
      $prepare->execute(["idmensaje" => $idmensaje]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Mensajeria::class);
    }

  }

?>