<?php

  class Docente extends DB
  {    
    public static function findDocenteCarreraCurso($idperiodo, $idcarrera, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_carrera_curso(:idperiodo, :idcarrera, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function findDocenteCarreraMateria($idperiodo, $idcarrera, $idnivel, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_carrera_materia(:idperiodo, :idcarrera, :idnivel, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function findDocenteCarreraMaterias($idperiodo, $idcarrera, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT M.idmateria, CONCAT(M.codigo,'-',M.materia)AS materia
                              FROM tb_detalle_cargahoraria D
                              INNER JOIN tb_carga_horaria C ON D.idcarga_horaria = C.idcarga_horaria
                              INNER JOIN tb_materia M ON D.idmateria = M.idmateria
                              WHERE C.idperiodo = :idperiodo
                              AND D.idcarrera = :idcarrera
                              AND C.iddocente = :iddocente");
      $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function validateTutor($idperiodo, $iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_tutor(:idperiodo, :iddocente);");
      $prepare->execute([":idperiodo" => $idperiodo, ":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function findDocenteMateria($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT M.idmateria, M.codigo, M.materia
                              FROM tb_materia M
                              INNER JOIN tb_detalle_cargahoraria D ON M.idmateria = D.idmateria
                              INNER JOIN tb_carga_horaria C ON C.idcarga_horaria = D.idcarga_horaria
                              WHERE C.idperiodo = :idperiodo
                              AND C.iddocente = :iddocente");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function findDocenteMateriaPresencial($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT M.idmateria, M.codigo, M.materia
                              FROM tb_materia M
                              INNER JOIN tb_detalle_cargahoraria D ON M.idmateria = D.idmateria
                              INNER JOIN tb_carga_horaria C ON C.idcarga_horaria = D.idcarga_horaria
                              WHERE C.idperiodo = :idperiodo
                              AND C.iddocente = :iddocente
                              AND D.modalidad = 'Presencial';");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function validaAdmisiones($params)
    {
      $db = new DB();

      $prepare = $db->prepare("SELECT * FROM tb_modulo_docente WHERE iddocente = :iddocente");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function findProfesorMateriaCarrera($params)
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT C.iddocente, CONCAT(D.apellido1,' ',D.apellido2,' ',D.nombre1)AS docente
                                FROM tb_carga_horaria C 
                                INNER JOIN tb_detalle_cargahoraria T ON C.idcarga_horaria = T.idcarga_horaria
                                INNER JOIN tb_docente D ON C.iddocente = D.iddocente
                                WHERE C.idperiodo = :idperiodo
                                AND T.idcarrera = :idcarrera
                                GROUP BY C.iddocente");
        $prepare->execute($params);

        return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

  }

?>