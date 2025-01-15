<?php

  class PagomatriculaController
  {
   
    public function index()
    {
      $carreras = Carrera::findAll();

      view('pagomatricula.index', ["carreras" => $carreras]); 
    }

    public static function findidentificacion($numero_identificacion)
    {
      $numero_identificacion = Main::limpiar_cadena($numero_identificacion);
      $resp = Pagomatricula::findidentificacion($numero_identificacion);
      
      echo json_encode($resp);
    }

    public static function findcorreo()
    {
      $data = json_decode(file_get_contents('php://input'));

      $correo_electronico = Main::limpiar_cadena($data->correo_electronico);
      $resp = Pagomatricula::findcorreo($correo_electronico);
      
      echo json_encode($resp);
    }

    public static function findestudianteid($idestudiante)
    {
      $idestudiante = Main::limpiar_cadena($idestudiante);
      $idestudiante = Main::decryption($idestudiante);
      
      $resp = Estudiante::findestudianteId($idestudiante);
       
      echo json_encode($resp);
    }

    public function insert()
    {
      $tipo_identificacion   = Main::limpiar_cadena($_POST['tipo_identificacion']);
      $numero_identificacion = Main::limpiar_cadena($_POST['numero_identificacion']);
      $apellido1             = Main::limpiar_cadena($_POST['apellido1']);
      $apellido2             = Main::limpiar_cadena($_POST['apellido2']);
      $nombre1               = Main::limpiar_cadena($_POST['nombre1']);
      $nombre2               = Main::limpiar_cadena($_POST['nombre2']);
      $correo_electronico    = Main::limpiar_cadena($_POST['correo_electronico']);
      $contrasena            = Main::encryption($numero_identificacion);

      $pagomatriculas = new Pagomatricula();
      $pagomatriculas->tipo_identificacion   = $tipo_identificacion;
      $pagomatriculas->numero_identificacion = $numero_identificacion;
      $pagomatriculas->apellido1             = $apellido1;
      $pagomatriculas->apellido2             = $apellido2;
      $pagomatriculas->nombre1               = $nombre1;
      $pagomatriculas->nombre2               = $nombre2;
      $pagomatriculas->correo_electronico    = $correo_electronico;
      $pagomatriculas->contrasena            = $contrasena;

      $pagomatriculas->insert();

      echo json_encode($pagomatriculas);
    }

    public static function findvalormatricula($idperiodo)
    {
      $idperiodo = Main::limpiar_cadena($idperiodo);
      $idperiodo = Main::decryption($idperiodo);

      $resp = Matricula::findvalormatricula($idperiodo);

      echo json_encode($resp);
    }

    public static function findnivelcarrera()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);

      $idperiodo = Main::decryption($idperiodo);
      $idcarrera = Main::decryption($idcarrera);

      $resp = Carrera::findNivelCarrera($idperiodo, $idcarrera);
      
      $options = '<option value="">-- Seleccione --</option>';
      foreach($resp as $row){
        $options .= '<option value="'.Main::encryption($row->idnivel).'">'.$row->nivel.'</option>';
      }

      echo json_encode($options);
    }

    public static function findnivelcarreraseccion()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);
      $idnivel = Main::limpiar_cadena($data->idnivel);

      $idperiodo = Main::decryption($idperiodo);
      $idcarrera = Main::decryption($idcarrera);
      $idnivel = Main::decryption($idnivel);

      $resp = Carrera::findNivelCarreraSeccion($idperiodo, $idcarrera, $idnivel);
      
      $options = '<option value="">-- Seleccione --</option>';
      foreach($resp as $row){
        $options .= '<option value="'.Main::encryption($row->idseccion).'">'.$row->seccion.'</option>';
      }

      echo json_encode($options);
    }

    public static function findpagomatricula()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idestudiante = Main::limpiar_cadena($data->idestudiante);
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idperiodo = Main::decryption($idperiodo);

      $resp = Pagomatricula::findpagoMatricula($idestudiante, $idperiodo);

      echo json_encode($resp);
    }

    public static function finddetalleidpago($idpagomatricula)
    {
      $idpago_matricula = Main::limpiar_cadena($idpagomatricula);

      $resp = Detallepagomatricula::finddetalleIdPago($idpago_matricula);
      
      echo json_encode($resp);
    }

    public function insertpago()
    {
      $idestudiante = Main::limpiar_cadena($_POST['idestudiante']);
      $idperiodo = Main::limpiar_cadena($_POST['idperiodo']);
      $idnivel = Main::limpiar_cadena($_POST['idnivel']);
      $idcarrera = Main::limpiar_cadena($_POST['idcarrera']);
      $idseccion = Main::limpiar_cadena($_POST['idseccion']);
      $modalidad = Main::limpiar_cadena($_POST['modalidad']);
      $tipo_matricula = Main::limpiar_cadena($_POST['tipo_matricula']);
      $valor_pagar = Main::limpiar_cadena($_POST['valormatricula']);
      
      $idperiodo = Main::decryption($idperiodo);
      $idnivel = Main::decryption($idnivel);
      $idcarrera = Main::decryption($idcarrera);
      $idseccion = Main::decryption($idseccion);
      
      $fecha_pago = Main::limpiar_cadena($_POST['fecha_pago']);
      $numero_factura = Main::limpiar_cadena($_POST['numero_factura']);
      $valorpago = Main::limpiar_cadena($_POST['valorpago']);

      $res = Pagomatricula::insertPago($idestudiante, $idperiodo, $tipo_matricula, $valor_pagar, $fecha_pago, $numero_factura, $valorpago);
      
      if($res){
        $res = Pagomatricula::insertMatricula($idestudiante, $idperiodo, $idnivel, $idcarrera, $idseccion, $modalidad);
        if($res){
          $res = 'Si matricula';  
        } else{
          $res = 'No matricula';
        }
      } else{
        $res = 'No pago';
      }
      
      echo json_encode($res);
    }

  }

?>