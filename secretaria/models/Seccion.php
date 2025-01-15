<?php

  class Seccion extends DB
  {

    public static function findAll()
    {
      $db = new DB();
      // $prepare = $db->prepare("call sp_seccion_select_all();");
      $prepare = $db->prepare("SELECT * FROM tb_seccion WHERE idperiodo = 28;");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Seccion::class);
    }

    public static function findSeccionIdPeriodo($idperiodo)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_seccion_select_idperiodo(:idperiodo);");
      $prepare->execute([":idperiodo" => $idperiodo]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Seccion::class);
    }

    public static function findSeccionIdCarrera($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_seccion_carrera(:idperiodo, :idcarrera);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Seccion::class);
    }

    public static function findSeccionIdCarreraPresencial($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT S.idseccion, S.seccion
                              FROM tb_seccion S
                              INNER JOIN tb_matricula M ON S.idseccion = M.idseccion
                              WHERE M.idperiodo = :idperiodo
                              AND M.idcarrera = :idcarrera
                              AND S.seccion <> 'En línea'
                              GROUP BY S.idseccion");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Seccion::class);
    }

    public static function findDatosSeccion($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_seccion WHERE idseccion = :idseccion");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Seccion::class);
    }

  }

?>

