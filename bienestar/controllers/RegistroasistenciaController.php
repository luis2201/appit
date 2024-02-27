<?php

    class RegistroasistenciaController
    {
        public function index()
        {
            $carreras = Carrera::findAll();

            view("registroasistencia.index", ["carreras" => $carreras]);
        }

        public function viewlistaestudiantemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);            
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $fecha     = $data->fecha;

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idmateria" => $idmateria];
            $resp = Registroasistencia::viewListaEstudianteMateria($params);
            
            $rows = '';
            $i = 1;
            foreach($resp as $row){
                $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idmatricula" => $row->idmatricula, ":fecha" => $fecha];
                $asistencias = Registroasistencia::findAsistenciaIdMatricula($params);
                
                $asistencia = "";
                foreach ($asistencias as $a) {
                    $idasistencia = $a->idasistencia;
                    $asistencia = $a->asistencia;
                    $observacion = $a->observacion;
                }  
                
                if($observacion!='JUSTIFICADA'){
                    $asistencia = ($asistencia!='0')?$asistencia:'<button id="'.Main::encryption($idasistencia).'" class="btn btn-sm btn-warning" onclick="justificar(this.id)">Justificar</button>';
                } else{
                    $asistencia = $asistencia;
                }

                $rows .= '<tr style="font-size:0.75em">
                            <td class="text-center" style="width:4%">'.$i++.'</td>
                            <td class="text-center" style="width:7%">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center" style="width:5%">'.$asistencia.'</td>                            
                            <td class="text-center" style="width:5%"><strong class="text-success">'.$observacion.'</strong></td>
                        </tr>';
            }

            echo json_encode($rows);
        }

        public function justificartarea()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);            
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $fecha     = $data->fecha;
            $idasistencia = Main::limpiar_cadena($data->idasistencia);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idmateria = Main::decryption($idmateria);
            $idasistencia = Main::decryption($idasistencia);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idasistencia" => $idasistencia, ":fecha" => $fecha];
            $resp = Registroasistencia::justificarTarea($params);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idmateria" => $idmateria];
            $resp = Registroasistencia::viewListaEstudianteMateria($params);
            
            $rows = '';
            $i = 1;
            foreach($resp as $row){
                $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idmatricula" => $row->idmatricula, ":fecha" => $fecha];
                $asistencias = Registroasistencia::findAsistenciaIdMatricula($params);
                
                $asistencia = "";
                foreach ($asistencias as $a) {
                    $idasistencia = $a->idasistencia;
                    $asistencia = $a->asistencia;
                    $observacion = $a->observacion;
                }  
                
                if($observacion!='JUSTIFICADA'){
                    $asistencia = ($asistencia!='0')?$asistencia:'<button id="'.Main::encryption($idasistencia).'" class="btn btn-sm btn-warning" onclick="justificar(this.id)">Justificar</button>';
                } else{
                    $asistencia = $asistencia;
                }

                $rows .= '<tr style="font-size:0.75em">
                            <td class="text-center" style="width:4%">'.$i++.'</td>
                            <td class="text-center" style="width:7%">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center" style="width:5%">'.$asistencia.'</td>                            
                            <td class="text-center" style="width:5%"><strong class="text-success">'.$observacion.'</strong></td>
                        </tr>';
            }

            echo json_encode($rows);
        }
    }

?>