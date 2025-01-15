<?php
  
  class Datosincompletos extends DB
  {
    public static function findAll()
    {
      $db = new DB();

      $prepare = $db->prepare("SELECT * FROM tb_estudiante WHERE estado = 'R'");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Datosincompletos::class);
    }
  }

?>