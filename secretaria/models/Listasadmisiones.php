<?php 

  class Listasadmisiones extends DB
  {

    public static function viewlista($idperiodo, $idcarrera, $modalidad)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_lista_admisiones_carreras_ID(:idperiodo, :idcarrera, :modalidad)");
      $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":modalidad" => $modalidad]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Listasadmisiones::class);
    }

  }

?>