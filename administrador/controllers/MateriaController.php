<?php

   class MateriaController
   {

      public function findmateriaidcarrera()
      {
         $data = json_decode(file_get_contents("php://input"));

         $idperiodo = Main::limpiar_cadena($data->idperiodo);
         $idcarrera = Main::limpiar_cadena($data->idcarrera);

         $idperiodo = Main::decryption($idperiodo);
         $idcarrera = Main::decryption($idcarrera);

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
            $tbody .= '<tr>
                        <td class="text-center">'.$row->codigo.'</td>
                        <td>'.$row->materia.'</td>
                        <td class="text-center">'.$row->nivel.'</td>
                        <td class="text-center">'.$row->idmateria.'</td>
                     </tr>';
         }

         $tfoot = '</tbody>
               </table>';

         echo json_encode($thead .  $tbody . $tfoot);
      }

   }