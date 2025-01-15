<?php

  class ListasnivelesController
  {

    public function index()
    { 
      $listaperiodos = Periodo::findActivo();     
      $carreras = Carrera::findAll();
      
      view('listasniveles.index', ["listaperiodos" => $listaperiodos, "carreras" => $carreras]);
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

      $res = Listasniveles::viewLista($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel);
      // $rows = '';
      // $i = 1;
      // foreach ($res as $row) {
      //   $rows .= '<tr>
      //               <td scope="col" class="text-center">'.$i++.'</td>
      //               <td scope="col" class="text-center">'.$row->numero_matricula.'</td>
      //               <td scope="col" class="">'.$row->alumnos.'</td>
      //               <td scope="col" class="text-center">'.$row->numero_identificacion.'</td>
      //               <td scope="col" class="text-center">'.$row->fecha_nacimiento.'</td>
      //               <td scope="col" class="text-center">'.$row->tipo_sangre.'</th>
      //               <td scope="col" class="text-center">'.$row->numero_celular.'</th>
      //             </tr>';
      // }
      
      echo json_encode($res);
    }
  
  }

?>