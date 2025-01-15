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
      $prepare = $db->prepare("call sp_docente_select_all();");
      $prepare->execute();

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
      return $prepare->execute($params);
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

  }

?>