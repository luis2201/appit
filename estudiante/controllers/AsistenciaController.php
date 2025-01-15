<?php

    class AsistenciaController
    {
        public function index()
        {
            view("asistencia.index", []);
        }

        public function findlistamaterias()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            
            $idperiodo = Main::decryption($idperiodo);
            $idestudiante = Main::decryption($idestudiante);
            
            $params = [":idperiodo" => $idperiodo, ":idestudiante" => $idestudiante];
            $resp = Asistencia::findMateriasIdEstudiante($params);

            $i = 1;
            $rows = '';

            foreach($resp as $row){
                $params = [":idperiodo" => $idperiodo, ":idmateria" => $row->idmateria];
                $horas = count(Asistencia::findHorasClase($params)) * 2;

                $params = [":idperiodo" => $idperiodo, ":idestudiante" => $idestudiante, ":idmateria" => $row->idmateria];
                $res = Asistencia::findAsistencias($params);
                
                $asistencias = 0;
                foreach($res as $asis){
                    if($asis->asistencia == 100){
                        $asistencias += 2;
                    } else if($asis->asistencia == 50){
                        $asistencias += 1;
                    } else{
                        $asistencia = 0;
                    }
                }

                $inasistencias = $horas - $asistencias;
                
                $pasistencia = ($horas>0)?$asistencias * 100 / $horas:0; 
                $pinasistencia = ($horas>0)?$inasistencias * 100 / $horas:0; 
                $pinasistencia = ($pinasistencia>=25)?'<td scope="col" class="text-center text-danger font-weight-bolder">'.number_format($pinasistencia,2).'%</td>':'<td scope="col" class="text-center">'.number_format($pinasistencia,2).'%</td>';
                $rows .= '<tr>
                            <td scope="col" class="text-center">'.$i++.'</td>
                            <td class="text-center">'.$row->codigo.'</td>
                            <td>'.$row->materia.'</td>
                            <td scope="col" class="text-center">'.$horas.'</td>
                            <td scope="col" class="text-center">'.$asistencias.'</td>
                            <td scope="col" class="text-center">'.$inasistencias.'</td>
                            <td scope="col" class="text-center">'.number_format($pasistencia,2).'%</td>
                            '.$pinasistencia.'
                            <td scope="col" class="text-center"></td>
                        </tr>';
            }

            echo json_encode($rows);
        }
    }

?>