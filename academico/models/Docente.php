<?php

  class Docente extends DB
  { 
    public $tipodocumento;
    public $numerodocumento;
    public $apellido1;
    public $apellido2;
    public $nombre1;
    public $nombre2;
    public $contrasena;

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT D.iddocente, D.numerodocumento, D.apellido1, D.apellido2, D.nombre1, D.nombre2
                              FROM tb_docente D 
                              ORDER BY D.apellido1, D.apellido2, D.nombre1, D.nombre2");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }
    
    public static function findDocenteIdCarrera($params)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT D.iddocente, CONCAT(D.apellido1, ' ', D.apellido2, ' ', D.nombre1, ' ', D.nombre2)AS docente
                              FROM tb_docente D 
                                INNER JOIN tb_carga_horaria C ON D.iddocente = C.iddocente
                                  INNER JOIN tb_detalle_cargahoraria T ON C.idcarga_horaria = T.idcarga_horaria
                              WHERE C.idperiodo = :idperiodo
                              AND T.idcarrera = :idcarrera
                              GROUP BY D.iddocente
                              ORDER BY D.apellido1, D.apellido2, D.nombre1, D.nombre2");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function findID($iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_select_id(:iddocente);");
      $prepare->execute([":iddocente" => $iddocente]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public static function findNumeroDocumento($numerodocumento)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_select_numerodocumento(:numerodocumento);");
      $prepare->execute([":numerodocumento" => $numerodocumento]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Docente::class);
    }

    public function insertDocente()
    {
      $params = [":tipodocumento" => $this->tipodocumento, ":numerodocumento" => $this->numerodocumento, ":apellido1" => $this->apellido1, ":apellido2" => $this->apellido2, ":nombre1" => $this->nombre1, ":nombre2" => $this->nombre2, ":contrasena" => $this->contrasena];
      
      $prepare = $this->prepare("call sp_docente_insert(:tipodocumento, :numerodocumento, :apellido1, :apellido2, :nombre1, :nombre2, :contrasena);");
      $prepare->execute($params);
    }

    public static function deleteDocente($iddocente)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_docente_delete(:iddocente);");
      
      return $prepare->execute([":iddocente" => $iddocente]);
    }

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