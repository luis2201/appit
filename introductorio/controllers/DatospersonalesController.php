<?php

  class DatospersonalesController
  {
    
    public function index()
    {
      $paises = Pais::findAll();
      $ciudades = Ciudad::findAll();

      view('datospersonales.index', ["paises" => $paises, "ciudades" => $ciudades]);
    }

    public static function find($idestudiante)
    {
      $idestudiante = Main::limpiar_cadena($idestudiante);
      $idestudiante = Main::decryption($idestudiante);
      $resp         = Datospersonales::find($idestudiante);

      $datospersonales  = new Datospersonales();
      $datospersonales->idestudiante            = Main::encryption($resp->idestudiante);
      $datospersonales->tipo_identificacion     = $resp->tipo_identificacion;
      $datospersonales->numero_identificacion   = $resp->numero_identificacion;
      $datospersonales->fecha_nacimiento        = $resp->fecha_nacimiento;
      $datospersonales->apellido1               = $resp->apellido1;
      $datospersonales->apellido2               = $resp->apellido2;
      $datospersonales->nombre1                 = $resp->nombre1;
      $datospersonales->nombre2                 = $resp->nombre2;
      $datospersonales->sexo                    = $resp->sexo;
      $datospersonales->genero                  = $resp->genero;
      $datospersonales->estado_civil            = $resp->estado_civil;
      $datospersonales->etnia                   = $resp->etnia;
      $datospersonales->tipo_sangre             = $resp->tipo_sangre;
      $datospersonales->discapacidad            = $resp->discapacidad;
      $datospersonales->porcentaje_discapacidad = $resp->porcentaje_discapacidad;
      $datospersonales->carnet_conadis          = $resp->carnet_conadis;
      $datospersonales->numero_carnet           = $resp->numero_carnet;
      $datospersonales->tipo_discapacidad       = $resp->tipo_discapacidad;
      $datospersonales->idpais_nacionalidad     = $resp->idpais_nacionalidad;
      $datospersonales->idcanton_nacimiento     = $resp->idcanton_nacimiento;
      $datospersonales->idpais_residencia       = $resp->idpais_residencia;
      $datospersonales->idcanton_residencia     = $resp->idcanton_residencia;
      $datospersonales->correo_electronico      = $resp->correo_electronico;
      $datospersonales->numero_celular          = $resp->numero_celular;
      $datospersonales->tipo_colegio            = $resp->tipo_colegio;
      $datospersonales->ocupacion               = $resp->ocupacion;
      $datospersonales->ingresos                = $resp->ingresos;
      $datospersonales->bono_desarrollo         = $resp->bono_desarrollo;
      $datospersonales->nivel_formacionp        = $resp->nivel_formacionp;
      $datospersonales->nivel_formacionm        = $resp->nivel_formacionm;
      $datospersonales->ingresos_hogar          = $resp->ingresos_hogar;
      $datospersonales->miembros_hogar          = $resp->miembros_hogar;
      $datospersonales->estado                  = $resp->estado;

      echo json_encode($datospersonales);
    }

    public function edit()
    {
      $idestudiante            = Main::limpiar_cadena($_POST['idestudiante']);
      $idestudiante            = Main::decryption($_POST['idestudiante']);
      $fecha_nacimiento        = main::limpiar_cadena($_POST['fecha_nacimiento']);
      $apellido1               = main::limpiar_cadena($_POST['apellido1']);
      $apellido2               = main::limpiar_cadena($_POST['apellido2']);
      $nombre1                 = main::limpiar_cadena($_POST['nombre1']);
      $nombre2                 = main::limpiar_cadena($_POST['nombre2']);
      $sexo                    = main::limpiar_cadena($_POST['sexo']);
      $genero                  = main::limpiar_cadena($_POST['genero']);
      $estado_civil            = main::limpiar_cadena($_POST['estado_civil']);
      $etnia                   = main::limpiar_cadena($_POST['etnia']);
      $tipo_sangre             = main::limpiar_cadena($_POST['tipo_sangre']);
      $discapacidad            = main::limpiar_cadena($_POST['discapacidad']);
      $porcentaje_discapacidad = main::limpiar_cadena($_POST['porcentaje_discapacidad']);
      $carnet_conadis          = main::limpiar_cadena($_POST['carnet_conadis']);
      $numero_carnet           = main::limpiar_cadena($_POST['numero_carnet']);
      $tipo_discapacidad       = main::limpiar_cadena($_POST['tipo_discapacidad']);
      $idpais_nacionalidad     = main::limpiar_cadena($_POST['idpais_nacionalidad']);
      $idcanton_nacimiento     = main::limpiar_cadena($_POST['idcanton_nacimiento']);
      $idpais_residencia       = main::limpiar_cadena($_POST['idpais_residencia']);
      $idcanton_residencia     = main::limpiar_cadena($_POST['idcanton_residencia']);
      $numero_celular          = main::limpiar_cadena($_POST['numero_celular']);
      $tipo_colegio            = main::limpiar_cadena($_POST['tipo_colegio']);
      $ocupacion               = main::limpiar_cadena($_POST['ocupacion']);
      $ingresos                = main::limpiar_cadena($_POST['ingresos']);
      $bono_desarrollo         = main::limpiar_cadena($_POST['bono_desarrollo']);
      $nivel_formacionp        = main::limpiar_cadena($_POST['nivel_formacionp']);
      $nivel_formacionm        = main::limpiar_cadena($_POST['nivel_formacionm']);
      $ingresos_hogar          = main::limpiar_cadena($_POST['ingresos_hogar']);
      $miembros_hogar          = main::limpiar_cadena($_POST['miembros_hogar']);
  
      $file           = $_FILES['doc_cedula']['name'];
      $path           = DOC;
      $newnamedoc     = strtotime("now");
      $extension      = pathinfo($file, PATHINFO_EXTENSION);
      $doc_cedula     = $newnamedoc . '.' . $extension;      
      move_uploaded_file($_FILES['doc_cedula']['tmp_name'], $path . $doc_cedula);

      $file           = $_FILES['doc_titulo']['name'];
      $path           = DOC;
      $newnamedoc     = strtotime("now")+1;
      $extension      = pathinfo($file, PATHINFO_EXTENSION);
      $doc_titulo     = $newnamedoc . '.' . $extension;
      move_uploaded_file($_FILES['doc_titulo']['tmp_name'], $path . $doc_titulo);

      $file           = $_FILES['foto']['name'];
      $path           = DOC;
      $newnamedoc     = strtotime("now")+1;
      $extension      = pathinfo($file, PATHINFO_EXTENSION);
      $foto           = $newnamedoc . '.' . $extension;
      move_uploaded_file($_FILES['foto']['tmp_name'], $path . $foto);

      $datospersonales = new Datospersonales();
      $datospersonales->idestudiante             = $idestudiante;
      $datospersonales->fecha_nacimiento         = $fecha_nacimiento;
      $datospersonales->apellido1                = $apellido1;
      $datospersonales->apellido2                = $apellido2;
      $datospersonales->nombre1                  = $nombre1;
      $datospersonales->nombre2                  = $nombre2;
      $datospersonales->sexo                     = $sexo;
      $datospersonales->genero                   = $genero;
      $datospersonales->estado_civil             = $estado_civil;
      $datospersonales->etnia                    = $etnia;
      $datospersonales->tipo_sangre              = $tipo_sangre;
      $datospersonales->discapacidad             = $discapacidad;
      $datospersonales->porcentaje_discapacidad  = $porcentaje_discapacidad;
      $datospersonales->carnet_conadis           = $carnet_conadis;
      $datospersonales->numero_carnet            = $numero_carnet;
      $datospersonales->tipo_discapacidad        = $tipo_discapacidad;
      $datospersonales->idpais_nacionalidad      = $idpais_nacionalidad;
      $datospersonales->idcanton_nacimiento      = $idcanton_nacimiento;
      $datospersonales->idpais_residencia        = $idpais_residencia;
      $datospersonales->idcanton_residencia      = $idcanton_residencia;
      $datospersonales->numero_celular           = $numero_celular;
      $datospersonales->tipo_colegio             = $tipo_colegio;
      $datospersonales->ocupacion                = $ocupacion;
      $datospersonales->ingresos                 = $ingresos;
      $datospersonales->bono_desarrollo          = $bono_desarrollo;
      $datospersonales->nivel_formacionp         = $nivel_formacionp;
      $datospersonales->nivel_formacionm         = $nivel_formacionm;
      $datospersonales->ingresos_hogar           = $ingresos_hogar;
      $datospersonales->miembros_hogar           = $miembros_hogar;
      $datospersonales->doc_cedula               = $doc_cedula;
      $datospersonales->doc_titulo               = $doc_titulo;
      $datospersonales->foto                     = $foto;

      echo json_encode($datospersonales->edit());

      // echo json_encode($datospersonales);
    }

  }
  

?>
