<?php

  class IngresocalificaciontotalController
  {
    public function index()
    {
      $periodos = Periodo::findActivo();

      view("ingresocalificaciontotal.index", ["periodo" => $periodos]);
    }

    public function viewlistaestudiantemateria()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idperiodo = Main::limpiar_cadena($data->idperiodo);      
      $idmateria = Main::limpiar_cadena($data->idmateria);

      $idperiodo = Main::decryption($idperiodo);

      $res = Ingresocalificaciontotal::viewListaEstudianteMateria($idperiodo, $idmateria);

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
      $p1 = Main::limpiar_cadena($data->p1);
      $p2 = Main::limpiar_cadena($data->p2);
      $sup = Main::limpiar_cadena($data->sup);
      $total = Main::limpiar_cadena($data->total);

      $idperiodo = Main::decryption($idperiodo);

      $registros = new Ingresocalificaciontotal();
      $registros->idmatricula = $idmatricula;
      $registros->idperiodo = $idperiodo;
      $registros->idcarrera = $idcarrera;      
      $registros->idnivel = $idnivel;
      $registros->idmateria = $idmateria;
      $registros->p1 = $p1;
      $registros->p2 = $p2;
      $registros->sup = $sup;
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

      $idperiodo = Main::decryption($idperiodo);

      $res = Ingresocalificaciontotal::findCalificacionidmatricula($idmatricula, $idperiodo, $idmateria, 1);
      foreach($res as $row){
        $p1 = $row->total;
      }

      $res = Ingresocalificaciontotal::findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, 2);
      foreach($res as $row){
        $p2 = $row->total;
        $sup = $row->supletorio;
      }

      $suma = number_format($p1+$p2,2);

        // if($suma>70 && $supletorio == 0){
        //   $total = number_format($suma,2);
        // } else {
        //   $total = number_format($p1+$p2+$supletorio,2);
        //   if($total>70 && $supletorio>0){
        //     $total = number_format(70,2);
        //   }
        // }
        $total = $suma;
        if($suma>=56 && $suma<=69){
          if($sup>=14){
            $total = $suma + $sup;
            if($total>70){
              $total = number_format(70,2);
            }
          } else{
            $total = $suma;
          }
        } elseif ($suma>=55) {
          if($sup>=15){
            $total = $suma + $sup;
            if($total>70){
              $total = number_format(70,2);
            }
          } else{
            $total = $suma;
          }
        } elseif ($suma>=54) {
          if($sup>=16){
            $total = $suma + $sup;
            if($total>70){
              $total = number_format(70,2);
            }
          } else{
            $total = $suma;
          }
        } elseif ($suma>=53) {
          if($sup>=17){
            $total = $suma + $sup;
            if($total>70){
              $total = number_format(70,2);
            }
          } else{
            $total = $suma;
          }
        } elseif ($suma>=52) {
          if($sup>=18){
            $total = $suma + $sup;
            if($total>70){
              $total = number_format(70,2);
            }
          } else{
            $total = $suma;
          }
        } elseif ($suma>=51) {
          if($sup>=19){
            $total = $suma + $sup;
            if($total>70){
              $total = number_format(70,2);
            }
          } else{
            $total = $suma;
          }
        } elseif ($suma>=50) {
          if($sup>=20){
            $total = number_format($suma + $sup,2);
            if($total>70){
              $total = number_format(70,2);
            }
          } else{
            $total = $suma;
          }
        }

      echo json_encode(["p1" => $p1, "p2" => $p2, "sup" => $sup, "total" => $total]);
    }
  }

?>