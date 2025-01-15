<?php

  class IngresocalificacionController
  {
    public function index()
    {
      $periodos = Periodo::findAll();

      view("ingresocalificacion.index", ["periodos" => $periodos]);
    }

    public function viewlistaestudiantemateria()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idperiodo = Main::limpiar_cadena($data->idperiodo);      
      $idmateria = Main::limpiar_cadena($data->idmateria);

      $idperiodo = Main::decryption($idperiodo);

      $res = Ingresocalificacion::viewListaEstudianteMateria($idperiodo, $idmateria);

      echo json_encode($res);
    }

    public function insertcalificacion()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idmatricula = Main::limpiar_cadena($data->idmatricula);
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);      
      $idnivel = Main::limpiar_cadena($data->idnivel);
      $idmateria = Main::limpiar_cadena($data->idmateria);
      $idparcial = Main::limpiar_cadena($data->idparcial);
      $aporte = Main::limpiar_cadena($data->aporte);
      $lecciones = Main::limpiar_cadena($data->lecciones);
      $tdocencia = Main::limpiar_cadena($data->tdocencia);
      $practica = Main::limpiar_cadena($data->practica);
      $tpractica = Main::limpiar_cadena($data->tpractica);
      $aprendizaje = Main::limpiar_cadena($data->aprendizaje);
      $taprendizaje = Main::limpiar_cadena($data->taprendizaje);
      $resultado = Main::limpiar_cadena($data->resultado);
      $tresultado = Main::limpiar_cadena($data->tresultado);
      $total = Main::limpiar_cadena($data->total);

      $idperiodo = Main::decryption($idperiodo);

      $registros = new Ingresocalificacion();
      $registros->idmatricula = $idmatricula;
      $registros->idperiodo = $idperiodo;
      $registros->idcarrera = $idcarrera;      
      $registros->idnivel = $idnivel;
      $registros->idmateria = $idmateria;
      $registros->idparcial = $idparcial;
      $registros->aporte = $aporte;
      $registros->lecciones = $lecciones;
      $registros->tdocencia = $tdocencia;
      $registros->practica = $practica;
      $registros->tpractica = $tpractica;
      $registros->aprendizaje = $aprendizaje;
      $registros->taprendizaje = $taprendizaje;
      $registros->resultado = $resultado;
      $registros->tresultado = $tresultado;
      $registros->total = $total;

      $registros->insertCalificacion();

      echo json_encode($registros);
    }

    public function findcalificacionidmatricula()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idmatricula = Main::limpiar_cadena($data->idmatricula);
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idmateria = Main::limpiar_cadena($data->idmateria);
      $idparcial = Main::limpiar_cadena($data->idparcial);

      $idperiodo = Main::decryption($idperiodo);
      
      $res = Ingresocalificacion::findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial);

      echo json_encode($res);
    }
  }

?>