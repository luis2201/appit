<?php

    class RegistroasistenciaController
    {
        public function index()
        {
            //$carreras = Carrera::findAll();
            $carreras = Carrera::findCarreraIdDocenteAll([":idperiodo" => 17, ":iddocente" => $_SESSION["idusuario_appit"]]);

            view("registroasistencia.index", ["carreras" => $carreras]);
        }

        public function viewlistaestudiantemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $fecha     = $data->fecha;

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
            $res = Registroasistencia::viewListaEstudianteMateria($params);
            
            $rows = '';
            $i = 1;
            foreach($res as $row){
                $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idmatricula" => $row->idmatricula, ":fecha" => $fecha];
                $asistencias = Registroasistencia::findAsistenciaIdMatricula($params);
                
                $asistencia = '';

                if(count($asistencias)==0){
                    $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idmatricula" => $row->idmatricula, ":fecha" => $fecha, ":asistencia" => 100];
                    $asis = Registroasistencia::Insert($params);

                    $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idmatricula" => $row->idmatricula, ":fecha" => $fecha];
                    $asistencias = Registroasistencia::findAsistenciaIdMatricula($params);
                }
                
                foreach ($asistencias as $a) {
                    $asistencia = $a->asistencia;    
                }

                if($asistencia == 100){
                    $p1 = 'checked';
                    $p2 = '';
                    $p3 = '';
                }

                if($asistencia == 50){
                    $p1 = '';
                    $p2 = 'checked';
                    $p3 = '';
                }

                if($asistencia == 0){
                    $p1 = '';
                    $p2 = '';
                    $p3 = 'checked';
                }

                $rows .= '<tr>
                            <td class="text-center" style="width:4%">'.$i++.'</td>
                            <td class="text-center" style="width:7%">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center" style="width:5%"><input type="radio" id="a1-'.$row->idmatricula.'" name="a-'.$row->idmatricula.'" onclick="asistencia(this.id)" class="form-check-input" style="margin:auto" '.$p1.'></td>
                            <td class="text-center" style="width:5%"><input type="radio" id="a2-'.$row->idmatricula.'" name="a-'.$row->idmatricula.'" onclick="asistencia(this.id)" class="form-check-input" style="margin:auto" '.$p2.'></td>
                            <td class="text-center" style="width:5%"><input type="radio" id="a3-'.$row->idmatricula.'" name="a-'.$row->idmatricula.'" onclick="asistencia(this.id)" class="form-check-input" style="margin:auto" '.$p3.'></td>
                         </tr>';
            }
            
            echo json_encode($rows);
        }

        public function actualizaasistencia()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $fecha     = $data->fecha;
            $asistencia = Main::limpiar_cadena($data->asistencia);

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":idmatricula" => $idmatricula, ":fecha" => $fecha, ":asistencia" => $asistencia];
            $res = Registroasistencia::ActualizaAsistencia($params);

            echo json_encode($res);
        }

        public function eliminaasistencia()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $fecha     = $data->fecha;

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":fecha" => $fecha];
            $res = Registroasistencia::EliminaAsistencia($params);
            $res = Leccionario::EliminaLeccionario($params);

            echo json_encode($res);
        }
    }

?>