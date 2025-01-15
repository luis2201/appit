<?php

  class Nivel extends DB
  {

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_nivel_select_all();");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNombreNIvel($params)
    { 
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_nivel WHERE idnivel = :idnivel;");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelIdPeriodoTutor($idperiodo, $iddocente)
    {
      $db = new DB();
      
      $prepare = $db->prepare("call sp_nivel_select_idperiodo_tutor(:idperiodo, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelIdPeriodoTutorEnLinea($params)
    {
      $db = new DB();
      
      $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                              FROM tb_detalle_cargahoraria D
                                  INNER JOIN tb_carga_horaria C ON D.idcarga_horaria = C.idcarga_horaria
                                  INNER JOIN tb_nivel N ON D.idnivel = N.idnivel
                              WHERE C.idperiodo = :idperiodo
                              AND D.idcarrera = :idcarrera
                              AND C.iddocente = :iddocente
                              AND D.modalidad = 'Virtual'
                              GROUP BY N.idnivel");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelIdDocente($params)
    {
      $db = new DB();
      
      $prepare = $db->prepare("call sp_nivel_virtual_select_iddocente(:idperiodo, :iddocente, :idcarrera);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelValidacion($params)
    {
      $db = new DB();
      
      $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                              FROM tb_matricula M
                                INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                  INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                              WHERE M.idperiodo = :idperiodo
                              AND M.idcarrera = :idcarrera
                              AND E.validacion = 1
                              GROUP BY N.idnivel");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

  }

?>