<?php

  class PromocionController
  {
    public function index()
    {
      $niveles = Nivel::findAll();
      $carreras = Carrera::findAll();
      $periodos = Periodo::findAll();

      view("promocion.index", ["periodos" => $periodos, "carreras" => $carreras, "niveles" => $niveles]);
    }

    public function viewlista()
    {
      $data = json_decode(file_get_contents('php://input'));
      
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);
      $idseccion = Main::limpiar_cadena($data->idseccion);
      $modalidad = Main::limpiar_cadena($data->modalidad);
      $idnivel = Main::limpiar_cadena($data->idnivel);

      $idperiodo = Main::decryption($idperiodo);
      $idcarrera = Main::decryption($idcarrera);
      // $idseccion = Main::decryption($idseccion);
      $idnivel = Main::decryption($idnivel);

      $res = Listasniveles::viewLista($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel);
      $rows = '';
      $i = 1;

      foreach ($res as $row) {
        $encryp = (ctype_lower(substr(Main::encryption($row->idmatricula),0,1))) ? ucfirst(Main::encryption($row->idmatricula)) : Main::encryption($row->idmatricula);                      
        $rows.='<tr id="'.Main::encryption($row->idmatricula).'">
                  <td class="text-center align-middle">'.$i++.'</td>
                  <td class="text-center align-middle">'.$row->idmatricula.'</td>
                  <td class="text-center align-middle">'.$row->numero_identificacion.'</td>
                  <td class="align-middle">'.$row->alumnos.'</td>
                  <td>
                    <a href="promocionpdf/'.$encryp.'" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i></button>
                  </td>      
                </tr>';
      }

      echo json_encode($rows);
    }

    public function viewcalificacion()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idmatricula = Main::limpiar_cadena($data->idmatricula);

      $idperiodo = Main::decryption($idperiodo);
      $idmatricula = Main::decryption($idmatricula);

      $rows = '';

      $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula];
      $resp = Promocion::findMaterias($params);      
      foreach($resp as $materias)
      {        
        $resp = Promocion::findParcial([":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria, ":idparcial" => 1]);
        foreach ($resp as $parcial1) {
          $p1 = ($parcial1->total>0)?number_format($parcial1->total, 2):"";
        }

        $resp = Promocion::findParcial([":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria, ":idparcial" => 2]);
        foreach ($resp as $parcial2) {
          $p2 = ($parcial2->total>0)?number_format($parcial2->total, 2):"";
          $supletorio = ($parcial2->supletorio>0)?number_format($parcial2->supletorio, 2):"";
        }
        
        $t = (($p1+$p2)>0) ? number_format($p1+$p2, 2) : "";
        $final = $t;
        if($t>=56 && $t<=69){
            if($supletorio>=14){
              $final = $t + $supletorio;
              if($final>70){
                $final = number_format(70,2);
              }
            } else{
              $final = $t;
            }
        } elseif ($t>=55) {
            if($supletorio>=15){
              $final = $t + $supletorio;
              if($final>70){
                $final = number_format(70,2);
              }
            } else{
              $final = $t;
            }
        } elseif ($t>=54) {
            if($supletorio>=16){
              $final = $t + $supletorio;
              if($final>70){
                $final = number_format(70,2);
              }
            } else{
              $final = $t;
            }
        } elseif ($t>=53) {
            if($supletorio>=17){
              $final = $t + $supletorio;
              if($final>70){
                $final = number_format(70,2);
              }
            } else{
              $final = $t;
            }
        } elseif ($t>=52) {
            if($supletorio>=18){
              $final = $t + $supletorio;
              if($final>70){
                $final = number_format(70,2);
              }
            } else{
              $final = $t;
            }
        } elseif ($t>=51) {
            if($supletorio>=19){
              $final = $t + $supletorio;
              if($final>70){
                $final = number_format(70,2);
              }
            } else{
              $final = $t;
            }
        } elseif ($t>=50) {
            if($supletorio>=20){
              $final = number_format($t + $supletorio,2);
              if($final>70){
                $final = number_format(70,2);
              }
            } else{
              $final = $t;
            }
        }

        $observacion = ($final>=70)?'<strong class="text-dark">APROBADO</strong>':'<strong class="text-danger">REPROBADO</strong>';
        $rows.= '<tr>
                  <td class="text-center">'.$materias->codigo.'</td>
                  <td style="width:30%">'.$materias->materia.'</td>
                  <td class="text-center">'.$p1.'</td>
                  <td class="text-center">'.$p2.'</td>
                  <td class="text-center">'.$supletorio.'</td>
                  <td class="text-center">'.$final.'</td>
                  <td class="text-center">'.$observacion.'</td>                  
                </tr>';
      }

      echo json_encode($rows);
    }

    public function viewcalificacionenlinea()
    {
        $data = json_decode(file_get_contents('php://input'));

        $idperiodo = Main::limpiar_cadena($data->idperiodo);
        $idmatricula = Main::limpiar_cadena($data->idmatricula);

        $idperiodo = Main::decryption($idperiodo);
        $idmatricula = Main::decryption($idmatricula);

        $rows = '';

        $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula];
        $resp = Promocion::findMaterias($params);      
        foreach($resp as $materias)
        {        
            $resp = Promocion::findVirtual([":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria]);
            foreach ($resp as $row) {
                $tdocencia = ($row->tdocencia>0)?number_format($row->tdocencia, 2):"";
                $tpractica = ($row->tpractica>0)?number_format($row->tpractica, 2):"";
                $taprendizaje = ($row->taprendizaje>0)?number_format($row->taprendizaje, 2):"";
                $tresultado = ($row->tresultado>0)?number_format($row->tresultado, 2):"";
                $t = ($row->total>0)?number_format($row->total, 2):"";
            }

            $total = $t;

            if($total!=''){
              $observacion = ($total>=70)?'<strong class="text-dark">APROBADO</strong>':'<strong class="text-danger">REPROBADO</strong>';
            } else{
              $observacion = '';
            }

            $rows.= '<tr>
                    <td class="text-center">'.$materias->codigo.'</td>
                    <td class="text-left" style="width:60%">'.$materias->materia.'</td>
                    <td class="text-center" style="width:10%">'.$total.'</td>                 
                    <td class="text-center" style="width:10%">'.$observacion.'</td>                  
                    </tr>';
        }

        echo json_encode($rows);
    }
  
  }
  
?>