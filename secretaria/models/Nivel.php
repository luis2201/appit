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

    public static function findAllNivelEstudianteCarrera($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                      FROM tb_estudiante E 
                        INNER JOIN tb_matricula M ON E.idestudiante = M.idestudiante
                          INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                      WHERE E.numero_identificacion = :numero_identificacion
                      AND M.idcarrera = :idcarrera
                      ORDER BY N.idnivel");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findAllIdEstudiante($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                              FROM tb_estudiante E 
                                INNER JOIN tb_matricula M ON E.idestudiante = M.idestudiante
                                  INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                              WHERE E.numero_identificacion = :numero_identificacion
                              AND M.idperiodo <> 28"); //Esta línea es para en los record académicos no colocar el periodo actual
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findCursoIdCarreraPresencial($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_nivel_carrera_presencial_select_all(:idperiodo, :idcarrera);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findCursoIdCarreraVirtual($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_nivel_carrera_virtual_select_all(:idperiodo, :idcarrera);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelSeccionCarreraModalidad($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_nivel_periodo_seccion_modalidad(:idperiodo, :idseccion, :idcarrera, :modalidad);");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelCarreraModalidad($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                              FROM tb_matricula M
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                  INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                  INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                              WHERE M.idperiodo = :idperiodo
                              AND M.idcarrera = :idcarrera
                              AND M.modalidad = :modalidad
                              AND E.validacion = 0
                              GROUP BY M.idnivel");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelCarreraEnLinea($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                              FROM tb_matricula M
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                  INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                  INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                              WHERE M.idperiodo = :idperiodo
                              AND M.idcarrera = :idcarrera
                              AND M.modalidad = 'Virtual'
                              AND E.validacion = 0
                              GROUP BY M.idnivel");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findNivelCarreraValidacion($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT N.idnivel, N.nivel
                              FROM tb_matricula M
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                  INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                  INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                              WHERE M.idperiodo = :idperiodo
                              AND M.idcarrera = :idcarrera                              
                              AND E.validacion = 1
                              GROUP BY M.idnivel");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

    public static function findDatosNivel($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT * FROM tb_nivel WHERE idnivel = :idnivel");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Nivel::class);
    }

  }

?>