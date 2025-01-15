<?php

   class MateriaController
   {

      public function findmateriasidcarrera()
      {
         $data = json_decode(file_get_contents('php://input'));

         $idperiodo = Main::limpiar_cadena($data->idperiodo);
         $idcarrera = Main::limpiar_cadena($data->idcarrera);

         $idperiodo = Main::decryption($idperiodo);
         $idcarrera = Main::decryption($idcarrera);

         $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
         $resp = Materia::findMateriaIdCarrera($param);

         $options = '<option value="">-- Seleccione Materia --</option>';
         foreach($resp as $row){
            $options .= '<option value="'.Main::encryption($row->idmateria).'">( '.$row->codigo.' ) '. $row->materia .'</option>';
         }

         echo json_encode($options);
      }
      
      public function findmateriaidcarrera()
      {
         $data = json_decode(file_get_contents("php://input"));

         $idperiodo = Main::limpiar_cadena($data->idperiodo);
         $idcarrera = Main::limpiar_cadena($data->idcarrera);
         $idmatricula = Main::limpiar_cadena($data->idmatricula);

         $idperiodo = Main::decryption($idperiodo);
         $idcarrera = Main::decryption($idcarrera);
         $idmatricula = Main::decryption($idmatricula);

         $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
         $resp = Materia::findMateriaIdCarrera($param);

         $thead = '<table class="table table-condensed table-hover mt-3" style="width: 100%;">
                     <thead class="bg-primary text-light text-center">
                        <tr>
                           <th>Código</th>
                           <th>Materia</th>
                           <th>nivel</th>
                           <th></th>
                        </tr>
                     </thead>
                  <tbody>';

         $tbody = '';

         foreach($resp as $row){
            $param = [":idmatricula" => $idmatricula, ":idmateria" => $row->idmateria];
            $resp = Materia::findMateriaIdMatricula($param);
            $cheked = (count($resp)>0)?'checked':'';

            $tbody .= '<tr>
                        <td class="text-center">'.$row->codigo.'</td>
                        <td>'.$row->materia.'</td>
                        <td class="text-center">'.$row->nivel.'</td>
                        <td class="text-center">
                           <div class="form-check form-switch">
                              <input onchange="modificaMateria(&quot;'.Main::encryption($idmatricula) .'&quot;,&quot;'. Main::encryption($row->idmateria).'&quot;);" class="form-check-input" type="checkbox" role="switch" '.$cheked.'>
                           </div>
                        </td>
                     </tr>';
         }

         $tfoot = '</tbody>
               </table>';

         echo json_encode($thead .  $tbody . $tfoot);
      }

   }