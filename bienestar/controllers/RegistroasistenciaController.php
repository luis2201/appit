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

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
            // $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idmateria" => $idmateria];
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
                
                if($observacion!='JUSTIFICADA' && $observacion!='NO JUSTIFICADA'){
                    $asistencia = ($asistencia!='0')?$asistencia:'<div class="btn-group" role="group" aria-label="Basic example"><button id="'.Main::encryption($idasistencia).'" class="btn btn-sm btn-success" style="font-size:10px;height:25px;padding:5px;" onclick="justificar(this.id, 1)"><i class="fas fa-check-circle"></i></button><button id="'.Main::encryption($idasistencia).'" class="btn btn-sm btn-danger" style="font-size:10px;height:25px;padding:5px;" onclick="justificar(this.id, 0)"><i class="fas fa-window-close"></i></button></div>';
                } else{
                    $asistencia = $asistencia;
                }

                $rows .= '<tr style="font-size:0.75em">
                            <td class="text-center" style="width:50px">'.$i++.'</td>
                            <td class="text-center" style="width:80px">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center" style="width:80px; padding:0; vertical-align:middle;">'.$asistencia.'</td>                            
                            <td class="text-center" style="width:200px;font-size:0.8em"><strong class="text-success">'.$observacion.'</strong></td>
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
            $observacion = Main::limpiar_cadena($data->observacion);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idmateria = Main::decryption($idmateria);
            $idasistencia = Main::decryption($idasistencia);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idasistencia" => $idasistencia, ":fecha" => $fecha, ":observacion" => $observacion];
            $resp = Registroasistencia::justificarTarea($params);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
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
                
                if($observacion!='JUSTIFICADA' && $observacion!='NO JUSTIFICADA'){
                    $asistencia = ($asistencia!='0')?$asistencia:'<div class="btn-group" role="group" aria-label="Basic example"><button id="'.Main::encryption($idasistencia).'" class="btn btn-sm btn-success" style="font-size:10px;height:25px;padding:5px;" onclick="justificar(this.id, 1)"><i class="fas fa-check-circle"></i></button><button id="'.Main::encryption($idasistencia).'" class="btn btn-sm btn-danger" style="font-size:10px;height:25px;padding:5px;" onclick="justificar(this.id, 0)"><i class="fas fa-window-close"></i></button></div>';
                } else{
                    $asistencia = $asistencia;
                }

                $rows .= '<tr style="font-size:0.75em">
                            <td class="text-center" style="width:50px">'.$i++.'</td>
                            <td class="text-center" style="width:80px">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center" style="width:80px; padding:0; vertical-align:middle;">'.$asistencia.'</td>                            
                            <td class="text-center" style="width:200px;font-size:0.8em"><strong class="text-success">'.$observacion.'</strong></td>
                        </tr>';
            }

            echo json_encode($rows);
        }
    }

?>