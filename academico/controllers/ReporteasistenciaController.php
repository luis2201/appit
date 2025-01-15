<?php

    class ReporteasistenciaController
    {
        public function index()
        {
            $carreras = Carrera::findAll();

            view("reporteasistencia.index", ["carreras" => $carreras]);
        }

        public function viewlistaestudiantes()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);;
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
            $resp = Materias::findDiasLaborales($params);
            $cols = count($resp);

            $table = '';
      
            $thead1 = '<table id="tbLista" class="table table-stripped" cellspacing="0" cellpadding="0" style="font-size:12px; margin-top: -20px; width:100%;">
                        <thead class="bg-primary text-light text-center">
                            <tr>
                                <th scope="col" rowspan="2" class="text-center align-middle" style="width: 3%;">#</th>
                                <th scope="col" rowspan="2" class="text-center align-middle verticalText" style="width: 6%;">MAT. N°</th>
                                <th scope="col" rowspan="2" class="text-center align-middle" style="width: 35%;">NOMINA</th>
                                <th scope="col" colspan="'.$cols.'" class="text-center align-middle">FECHAS</th>
                            </tr>
                            <tr>';    
            $thead2 = '';
            $fechas = array();
            foreach($resp as $row){
                $fecha = $row->fecha;
                $fechaEntera = strtotime($fecha);

                array_push($fechas, $fecha);
                
                $mes = date("m", $fechaEntera);
                $dia = date("d", $fechaEntera);

                $thead2 .= '<th class="text-center" style="font-size:0.8em">'.$dia . '-' . $mes.'</th>';
            }

            $thead3 ='</tr>
                    </thead>
                <tbody>';
            
            $thead = $thead1 . $thead2 . $thead3;

            $rows = '';
            
            $tfood = '</tbody>
                </table>';

            $resp = Reporteasistencia::ViewListaEstudiantes($params);
            $n=0;
            $i=1;
            foreach ($resp as $row) {
                $params = [":idmateria" => $idmateria, ":idmatricula" => $row->idmatricula];
                $asistencias = Reporteasistencia::findIdMatriculaFecha($params);
                
                $row1 = '<tr>
                            <td class="text-center">'.$i++.'</td>
                            <td class="text-center">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>';

                $row2 = '';
                if(count($asistencias) > 0) {
                    foreach($asistencias as $asis){
                        $row2 .= '<td class="text-center" style="width:1%">'.$asis->asistencia.'</td>';
                    }
                } else {
                    for($j=1; $j<=$cols; $j++){
                        $row2 .= '<td class="text-center" style="width:1%">-</td>';
                    }
                }
                
                $row3 = '</tr>';
                $rows .= $row1 . $row2 . $row3;
                $n = $n+1;
            }

            echo json_encode($thead.$rows.$tfood);
        }
    
    }

?>