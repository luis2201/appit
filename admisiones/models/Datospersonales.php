<?php

  class Datospersonales extends DB
  {
    public $idadmisiones;
    public $tipo_identificacion;
    public $numero_identificacion;
    public $fecha_nacimiento;
    public $apellido1;
    public $apellido2;
    public $nombre1;
    public $nombre2;
    public $sexo;
    public $genero;
    public $estado_civil;
    public $etnia;
    public $tipo_sangre;
    public $discapacidad;
    public $porcentaje_discapacidad;
    public $carnet_conadis;
    public $numero_carnet;
    public $tipo_discapacidad;
    public $idpais_nacionalidad;
    public $idcanton_nacimiento;
    public $idpais_residencia;
    public $idcanton_residencia;
    public $correo_electronico;
    public $numero_celular;
    public $tipo_colegio;
    public $ocupacion;
    public $ingresos;
    public $bono_desarrollo;
    public $nivel_formacionp;
    public $nivel_formacionm;
    public $ingresos_hogar;
    public $miembros_hogar;
    public $doc_cedula;
    public $doc_titulo;
    public $foto;
    public $estado;

    public static function find($idadmisiones)
    {
        $db = new DB();
        $prepare = $db->prepare("call sp_admisiones_select_id(:idadmisiones)");
        $prepare->execute([":idadmisiones" => $idadmisiones]);

        return $prepare->fetchObject(Datospersonales::class);
    }

    public function edit()
    {
        $params = [
          ":idadmisiones" => $this->idadmisiones, 
          ":fecha_nacimiento" => $this->fecha_nacimiento, 
          ":apellido1" => $this->apellido1, 
          ":apellido2" => $this->apellido2, 
          ":nombre1" => $this->nombre1, 
          ":nombre2" => $this->nombre2,
          ":sexo" => $this->sexo, 
          ":genero" => $this->genero,
          ":estado_civil" => $this->estado_civil,
          ":etnia" => $this->etnia,
          ":tipo_sangre" => $this->tipo_sangre,
          ":discapacidad" => $this->discapacidad,
          ":porcentaje_discapacidad" => $this->porcentaje_discapacidad,
          ":carnet_conadis" => $this->carnet_conadis,
          ":numero_carnet" => $this->numero_carnet,
          ":tipo_discapacidad" => $this->tipo_discapacidad,
          ":idpais_nacionalidad" => $this->idpais_nacionalidad,
          ":idcanton_nacimiento" => $this->idcanton_nacimiento,
          ":idpais_residencia" => $this->idpais_residencia,
          ":idcanton_residencia" => $this->idcanton_residencia,
          ":numero_celular" => $this->numero_celular,
          ":tipo_colegio" => $this->tipo_colegio,
          ":ocupacion" => $this->ocupacion,
          ":ingresos" => $this->ingresos,
          ":bono_desarrollo" => $this->bono_desarrollo,
          ":nivel_formacionp" => $this->nivel_formacionp,
          ":nivel_formacionm" => $this->nivel_formacionm,
          ":ingresos_hogar" => $this->ingresos_hogar,
          ":miembros_hogar" => $this->miembros_hogar,
          ":doc_cedula" => $this->doc_cedula,
          ":doc_titulo" => $this->doc_titulo,
          ":foto" => $this->foto
        ];
        
        $prepare = $this->prepare("call sp_admisiones_update(:idadmisiones, :fecha_nacimiento, :apellido1, :apellido2, :nombre1, :nombre2, :sexo, :genero, :estado_civil, :etnia, :tipo_sangre, :discapacidad, :porcentaje_discapacidad, :carnet_conadis, :numero_carnet, :tipo_discapacidad, :idpais_nacionalidad, :idcanton_nacimiento, :idpais_residencia, :idcanton_residencia, :numero_celular, :tipo_colegio, :ocupacion, :ingresos, :bono_desarrollo, :nivel_formacionp, :nivel_formacionm, :ingresos_hogar, :miembros_hogar, :doc_cedula, :doc_titulo, :foto)");
        return $prepare->execute($params);
    }

  }
  
?>
