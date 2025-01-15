<?php

  class SupletorioController
  {

    public function index()
    {
      view("supletorio.index", []);
    }

    public function viewlistaestudiantemateria()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);
      $idseccion = Main::limpiar_cadena($data->idseccion);
      $modalidad = Main::limpiar_cadena($data->modalidad);
      $idnivel   = Main::limpiar_cadena($data->idnivel);
      $idmateria = Main::limpiar_cadena($data->idmateria);

      $idperiodo = Main::decryption($idperiodo);

      $res = Registrocalificacion::viewListaEstudianteMateria($idperiodo, $idmateria);
      
      $i=1;
      foreach($res as $row){
        $parciales = Registrocalificacion::findcalificacionidmatricula($row->idmatricula, $idperiodo, $idmateria, 1);
        foreach($parciales as $parcial)
        {
          $p1 = $parcial->total;
        }

        $parciales = Registrocalificacion::findcalificacionidmatricula($row->idmatricula, $idperiodo, $idmateria, 2);
        foreach($parciales as $parcial)
        {
          $p2 = $parcial->total;
          $supletorio = ($parcial->supletorio>0)?$parcial->supletorio:"";          
        }

        $suma = number_format($p1+$p2,2);

        // if($suma>70 && $supletorio == 0){
        //   $final = number_format($suma,2);
        // } else {
        //   $final = number_format($p1+$p2+$supletorio,2);
        //   if($final>70 && $supletorio>0){
        //     $final = number_format(70,2);
        //   }
        // }
        $final = $suma;
        if($suma>=56 && $suma<=69){
          if($supletorio>=14){
            $final = $suma + $supletorio;
            if($final>70){
              $final = number_format(70,2);
            }
          } else{
            $final = $suma;
          }
        } elseif ($suma>=55) {
          if($supletorio>=15){
            $final = $suma + $supletorio;
            if($final>70){
              $final = number_format(70,2);
            }
          } else{
            $final = $suma;
          }
        } elseif ($suma>=54) {
          if($supletorio>=16){
            $final = $suma + $supletorio;
            if($final>70){
              $final = number_format(70,2);
            }
          } else{
            $final = $suma;
          }
        } elseif ($suma>=53) {
          if($supletorio>=17){
            $final = $suma + $supletorio;
            if($final>70){
              $final = number_format(70,2);
            }
          } else{
            $final = $suma;
          }
        } elseif ($suma>=52) {
          if($supletorio>=18){
            $final = $suma + $supletorio;
            if($final>70){
              $final = number_format(70,2);
            }
          } else{
            $final = $suma;
          }
        } elseif ($suma>=51) {
          if($supletorio>=19){
            $final = $suma + $supletorio;
            if($final>70){
              $final = number_format(70,2);
            }
          } else{
            $final = $suma;
          }
        } elseif ($suma>=50) {
          if($supletorio>=20){
            $final = number_format($suma + $supletorio,2);
            if($final>70){
              $final = number_format(70,2);
            }
          } else{
            $final = $suma;
          }
        }

        $suma = ($suma>=70)?'<td class="text-center text-success">'.$suma.'</td>':'<td class="text-center text-danger">'.$suma.'</td>';
        
        $rows.='<tr>
                  <td class="text-center" style="width:10%">'.$i++.'</td>
                  <td class="text-center"><input id="idmatricula-'.$row->idmatricula.'" type="text" style="border: 0; background-color:#fff; width:100px; text-align: center;" value="'.$row->idmatricula.'" disabled="true"></td>
                  <td>'.$row->estudiante.'</td>
                  <td class="text-center"><input id="p1-'.$row->idmatricula.'" type="text" style="border: 0; background-color:#fff; width:100px; text-align: center;" value="'.$p1.'" disabled="true"></td>
                  <td class="text-center"><input id="p2-'.$row->idmatricula.'" type="text" style="border: 0; background-color:#fff; width:100px; text-align: center;" value="'.$p2.'" disabled="true"></td>
                  '.$suma.
                  '<td class="text-center"><input id="sp-'.$row->idmatricula.'" type="text" style="border: 0; width:100px; text-align: center;" onkeyup="total(this.id);"  onkeypress="return filterFloat(event,this);" value="'.$supletorio.'"></td>
                  <td class="text-center"><input id="t-'.$row->idmatricula.'" type="text" style="border: 0; background-color:#fff; width:100px; text-align: center;" disabled="true" value="'.number_format($final,2).'"></td>
                </tr>';
        $p2 = "";
        $p1 = "";
        $supletorio = "";
      }

      echo json_encode($rows);
    }
    
    public function findcalificacionidmatricula()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idmatricula = Main::limpiar_cadena($data->idmatricula);
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idmateria = Main::limpiar_cadena($data->idmateria);
      $idparcial = Main::limpiar_cadena($data->idparcial);
      
      $idperiodo = Main::decryption($idperiodo);
      
      $res = Supletorio::findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial);

      echo json_encode($res);
    }

    public function insertsupletorio()
    {
      $data = json_decode(file_get_contents('php://input'));

      $idmatricula = Main::limpiar_cadena($data->idmatricula);
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);
      $idseccion = Main::limpiar_cadena($data->idseccion);
      $modalidad = Main::limpiar_cadena($data->modalidad);
      $idnivel = Main::limpiar_cadena($data->idnivel);
      $idmateria = Main::limpiar_cadena($data->idmateria);
      $supletorio = Main::limpiar_cadena($data->supletorio);
      $total = Main::limpiar_cadena($data->total);

      $idperiodo = Main::decryption($idperiodo);

      $params = [":idmatricula" => $idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":supletorio" => $supletorio];
      $resp = Supletorio::insertSupletorio($params); 

      echo json_encode($params);
    }

  }  

?>