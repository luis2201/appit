<?php
  
  class Solicitudmatricula extends DB
  {
    public $idmatricula;
    public $idestudiante;
    public $idperiodo;
    public $idnivel;
    public $idcarrera;
    public $idseccion;
    public $modalidad;

    public static function find($params)
    {
      $db = new DB();
      $prepare = $db->prepare("call sp_matricula_select_idestudiante(:idestudiante, :idperiodo)");
      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudmatricula::class);
    }

    public static function findMatriculaIdEstudiante($params)
    {
      $db = new DB();
      // $prepare = $db->prepare("call sp_matricula_select_idestudiante(:idperiodo, :idestudiante)");
      $prepare = $db->prepare("SELECT M.idmatricula, P.idperiodo, P.periodo, C.idcarrera, C.carrera, N.idnivel, N.nivel
                              FROM tb_matricula M 
                                INNER JOIN tb_periodo P ON M.idperiodo = P.idperiodo
                                INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                              WHERE M.idestudiante = :idestudiante");

      $prepare->execute($params);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Solicitudmatricula::class);
    }

    public function insert()
    {
        $params = [":idestudiante" => $this->idestudiante, ":idperiodo" => $this->idperiodo,  ":idnivel" => $this->idnivel, ":idcarrera" => $this->idcarrera, ":idseccion" => $this->idseccion, ":modalidad" => $this->modalidad];
        
        $prepare = $this->prepare("call sp_matricula_insert(:idestudiante, :idperiodo, :idnivel, :idcarrera, :idseccion, :modalidad)");
        $prepare->execute($params);
    }

  }
  
?>