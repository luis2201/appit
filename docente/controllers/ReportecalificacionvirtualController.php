<?php

    class ReportecalificacionvirtualController
    {
        public function index()
        {
            $carreras = Carrera::findCarreraIdDocente([":idperiodo" => 12, ":iddocente" => $_SESSION["idusuario_appit"]]);

            view("reportecalificacionvirtual.index", ["carreras" => $carreras]);
        }

        public function findestudianteidmateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);
            
            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria]; 
            $resp = Estudiante::findEstudianteIdMateria($params);
            
            $rows = '';
            $i = 1;

            foreach ($resp as $row) {
                $params = [":idperiodo" => $idperiodo, ":idmatricula" => $row->idmatricula, ":idmateria" => $idmateria];
                $calificaciones = Estudiante::findCalificacionVirtualEstudiante($params);
                foreach ($calificaciones as $calificacion) {
                    $aporte = $calificacion->aporte;
                    $lecciones = $calificacion->lecciones;
                    $tdocencia = $calificacion->tdocencia;
                    $practica = $calificacion->practica;
                    $tpractica = $calificacion->tpractica;
                    $aprendizaje = $calificacion->aprendizaje;
                    $taprendizaje = $calificacion->taprendizaje;
                    $resultado = $calificacion->resultado;
                    $tresultado = $calificacion->tresultado;
                    $total = ($calificacion->total>=70)?'<td class="text-center fw-bold" style="background-color:#EAEAEA">'.$calificacion->total.'</td>':'<td class="text-center fw-bold text-danger" style="background-color:#EAEAEA">'.$calificacion->total.'</td>';
                }
                
                $rows .= '<tr>
                            <td class="text-center">'.$i++.'</td>
                            <td class="text-center">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center">'.$aporte.'</td>
                            <td class="text-center">'.$lecciones.'</td>
                            <td class="text-center fw-semibold" style="background-color:#C0E4FF">'.$tdocencia.'</td>
                            <td class="text-center">'.$practica.'</td>
                            <td class="text-center fw-semibold" style="background-color:#C0E4FF">'.$tpractica.'</td>
                            <td class="text-center">'.$aprendizaje.'</td>
                            <td class="text-center fw-semibold" style="background-color:#C0E4FF">'.$taprendizaje.'</td>
                            <td class="text-center">'.$resultado.'</td>
                            <td class="text-center fw-semibold" style="background-color:#C0E4FF">'.$tresultado.'</td>
                            '.$total.'
                          </tr>';
    
                $aporte = "";
                $lecciones = "";
                $tdocencia = "";
                $practica = "";
                $tpractica = "";
                $aprendizaje = "";
                $taprendizaje = "";
                $resultado = "";
                $tresultado = "";
                $total = "";
            }

            echo json_encode($rows);
        }
    }

?>