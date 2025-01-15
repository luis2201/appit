<?php

    class ReporteasistenciaController
    {
        public function index()
        {
            $carreras = Carrera::findAll();

            view("reporteasistencia.index", ["carreras" => $carreras]);
        }

        public function viewlistaestudiantemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);            
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
            // $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idmateria" => $idmateria];
            $resp = Reporteasistencia::viewListaEstudianteMateria($params);
            
            $rows = '';
            $i = 1;

            //ASISTENCIA
            // $params = [":idperiodo" => $idperiodo, ":idmateria" =>  $idmateria];
            $horas = count(Reporteasistencia::findHorasClase($params)) * 2;

            foreach($resp as $row){
                $params = [":idmateria" => $idmateria, ":idmatricula" => $row->idmatricula];
                $porc = Reporteasistencia::findAsistenciaEstudianteMateria($params);
                
                $asistencias = 0;
                foreach($porc as $asis){
                    if($asis->asistencia == 100){
                        $asistencias += 2;
                    } else if($asis->asistencia == 50){
                        $asistencias += 1;
                    } else{
                        $asistencia = 0;
                    }
                }   

                $pasistencia = number_format(($horas>0)?$asistencias * 100 / $horas:0,2);
                $asistencia = ($pasistencia>=75)?'<td class="text-center" style="width:5%">'.$pasistencia.'</td>':'<td class="text-center text-danger" style="width:5%">'.$pasistencia.'</td>';


                $rows .= '<tr style="font-size:0.75em">
                            <td class="text-center" style="width:4%">'.$i++.'</td>
                            <td class="text-center" style="width:7%">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center" style="width:5%">'.$horas.'</td>                            
                            <td class="text-center" style="width:5%">'.$asistencias.'</td>
                            '.$asistencia.'
                            <td style="width:10%;text-align:center;"><a id="'.Main::encryption($row->idmatricula).'" href="javascript:;" onclick="mostrar(this.id)">Ver detalle</a></td>
                        </tr>';
            }
        
            echo json_encode($rows);
        }

        public function findfaltasfecha()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idmatricula = Main::limpiar_cadena($data->idmatricula);

            $idmateria = Main::decryption($idmateria);
            $idmatricula = Main::decryption($idmatricula);

            $params = [":idmateria" => $idmateria, ":idmatricula" => $idmatricula];
            $resp = Reporteasistencia::findFaltasFecha($params);

            $rows = '';
            $asistencia = '';

            foreach ($resp as $row) {
                $asistencia = ($row->asistencia==0)?'<td class="text-danger text-center">FALTA</td>':'<td class="text-warning text-center">ATRASO</td>';
                $rows .= '<tr>
                            <td>'.$row->fecha.'</td>'
                            .$asistencia.'
                          </tr>';
            }

            echo json_encode($rows);
        }
    
    }

?>