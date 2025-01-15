<?php

    class EstudiantesController
    {

        public function findAllEstudiantesPeriodoModulo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo); 

            $param = [":idperiodo" => $idperiodo];
            $resp = Estudiantes::findAllEstudiantesPeriodoModulo($param);

            // $row = '';
            // $i = 1;
            // foreach($resp as $row){
            //     $rows .= '<tr>
            //                 <td class="text-center" style="width: 20%">'. $row->idmatricula .'</td>
            //                 <td>'. $row->estudiante .'</td>
            //                 <td class="text-center" style="width: 20%">';
                            
            //     $idmatricula = $row->idmatricula;
            //     $params = [":idmatricula" => $idmatricula];                                
            //     $resp = Examensuficiencia::validaInscripcion($params);                                
                                                
            //     if(count($resp)==0){
            //         $rows .= '<button id="'. Main::encryption($row->idmatricula) .'" class="btn btn-primary btn-sm" onclick="inscripcion(this.id)">
            //                     <i class="fa fa-check" aria-hidden="true"></i> Inscribir
            //                     </button>';
            //     } else{ 
            //         $rows .= '<span class="badge bg-success">Inscrito</span>';
            //     } 
                
            //     $rows .= '</td>
            //             </tr>';
            // }

            echo json_encode($resp);
        }

    }

?>