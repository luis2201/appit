<?php

  class CertificadomatriculaController
  {
    public function index()
    {
      $periodo = Periodo::findActivo();      
      
      view('certificadomatricula.index', ["periodo" => $periodo]);
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
      //$idcarrera = Main::decryption($idcarrera);
      //$idseccion = Main::decryption($idseccion);
      //$idnivel = Main::decryption($idnivel);

      $res = Listasniveles::viewLista($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel);
      $rows = '';
      $i = 1;

      foreach ($res as $row) {
        $encryp = (ctype_lower(substr(Main::encryption($row->idmatricula),0,1))) ? ucfirst(Main::encryption($row->idmatricula)) : Main::encryption($row->idmatricula);

        $rows .= '<tr id="'.$row->idmatricula.'">
                    <td class="text-center">'.$i++.'</td>
                    <td class="text-center">'.$row->idmatricula.'</td>
                    <td>'.$row->alumnos.'</td>
                    <td class="text-center">'.$row->idmatricula.'</td>
                    <td class="text-center"><a href="reportepdf/'.$encryp.'" class="btn-primary btn-sm" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                  </tr>';
      }

      echo json_encode($rows);
    }

    public function viewlistas()
    {
      $data = json_decode(file_get_contents('php://input'));
      
      $idperiodo = Main::limpiar_cadena($data->idperiodo);
      $idcarrera = Main::limpiar_cadena($data->idcarrera);      
      $modalidad = Main::limpiar_cadena($data->modalidad);
      $idnivel = Main::limpiar_cadena($data->idnivel);

      $idperiodo = Main::decryption($idperiodo);      

      $res = Listasniveles::viewListas($idperiodo, $idcarrera, $modalidad, $idnivel);
      $rows = '';
      $i = 1;

      foreach ($res as $row) {
        $encryp = (ctype_lower(substr(Main::encryption($row->idmatricula),0,1))) ? ucfirst(Main::encryption($row->idmatricula)) : Main::encryption($row->idmatricula);
        if($idperiodo == 21) {
          $rows .= '<tr id="'.$row->idmatricula.'">
                    <td class="text-center">'.$i++.'</td>
                    <td class="text-center">'.$row->numero_matricula.'</td>
                    <td>'.$row->alumnos.'</td>
                    <td class="text-center">'.$row->numero_identificacion.'</td>
                    <td class="text-center"><a href="reportepdf/'.$encryp.'" class="btn-primary btn-sm" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                  </tr>';
        } else {
          $rows .= '<tr id="'.$row->idmatricula.'">
                    <td class="text-center">'.$i++.'</td>
                    <td class="text-center">'.$row->idmatricula.'</td>
                    <td>'.$row->alumnos.'</td>
                    <td class="text-center">'.$row->numero_identificacion.'</td>
                    <td class="text-center"><a href="reportepdf/'.$encryp.'" class="btn-primary btn-sm" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                  </tr>';
        }
        
      }

      echo json_encode($rows);
    }
  }

?>