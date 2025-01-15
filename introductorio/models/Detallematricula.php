<?php

  class Detallematricula extends DB
  {

    public $idmatricula;
    public $idmateria;

    public function insert()
    {
      $params = [":idmatricula" => $this->idmatricula, ":idmateria" => $this->idmateria];
      
      $prepare = $this->prepare("call sp_detallematricula_insert(:idmatricula, :idmateria)");
      $prepare->execute($params);
    }
    
  }

?>