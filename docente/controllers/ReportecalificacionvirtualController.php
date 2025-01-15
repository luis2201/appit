<?php

    class ReportecalificacionvirtualController
    {
        public function index()
        {
            $periodo = Periodo::findActivo();
      
            foreach($periodo as $row){
                $idperiodo = $row->idperiodo;
            }

            $carreras = Carrera::findCarreraIdDocente([":idperiodo" => $idperiodo, ":iddocente" => $_SESSION["idusuario_appit"]]);

            view("reportecalificacionvirtual.index", ["carreras" => $carreras]);
        }

        public function findestudianteidmateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idparcial = Main::limpiar_cadena($data->idparcial);

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

        public function viewlistaestudiantemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);      
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $res = Registrocalificacionvirtual::viewListaEstudianteMateria($idperiodo, $idmateria);       

            $i=1;
            $rows = '';
            foreach($res as $row){
                $parciales = Registrocalificacionvirtual::findcalificacionidmatricula($row->idmatricula, $idperiodo, $idmateria, 1);

                foreach($parciales as $parcial)
                {
                    $p1 = $parcial->total;  
                }

                $parciales = Registrocalificacionvirtual::findcalificacionidmatricula($row->idmatricula, $idperiodo, $idmateria, 2);
                foreach($parciales as $parcial)
                {
                    $p2 = $parcial->total;
                    $supletorio = ($parcial->supletorio>0)?number_format(round($parcial->supletorio),2):"";
                }

                $suma = number_format($p1+$p2,2);
                
                $final = $suma;
                if($suma>=56 && $suma<=69){
                    if($supletorio>=14){
                        $final = $suma + $supletorio;
                        if($final>70){
                            $final = number_format(70,2);
                        }
                    } else{
                        $final = $suma;
                    }
                } elseif ($suma>=55) {
                    if($supletorio>=15){
                        $final = $suma + $supletorio;
                        if($final>70){
                            $final = number_format(70,2);
                        }
                    } else{
                        $final = $suma;
                    }
                } elseif ($suma>=54) {
                if($supletorio>=16){
                    $final = $suma + $supletorio;
                    if($final>70){
                        $final = number_format(70,2);
                    }
                    } else{
                        $final = $suma;
                    }
                } elseif ($suma>=53) {
                    if($supletorio>=17){                    
                        $final = $suma + $supletorio;
                        if($final>70){
                            $final = number_format(70,2);
                        }
                    } else{
                        $final = $suma;
                    }
                } elseif ($suma>=52) {
                    if($supletorio>=18){
                        $final = $suma + $supletorio;
                        if($final>70){
                            $final = number_format(70,2);
                        }
                    } else{
                        $final = $suma;
                    }
                } elseif ($suma>=51) {
                    if($supletorio>=19){
                        $final = $suma + $supletorio;
                        if($final>70){
                            $final = number_format(70,2);
                        }
                    } else{
                        $final = $suma;
                    }
                } elseif ($suma>=50) {
                    if($supletorio>=20){
                        $final = number_format($suma + $supletorio,2);
                        if($final>70){
                            $final = number_format(70,2);
                        }
                    } else{
                        $final = $suma;
                    }
                }

                $asistencia = '<td class="text-center"></td>';
                //OBSERVACIÓN             
                if ($final >= 70) {                
                    $observacion = '<td class="text-center">APROBADO</td>';
                } elseif ($final >= 70) {
                    $observacion = '<td class="text-center text-danger">R.P.FALTAS</td>';
                } elseif ($final >= 50 && $final < 70 && !$supletorio) { // Si la calificación es menor a 70 y no hay valor en $supletorio
                    $observacion = '<td class="text-center text-success">SUPLETORIO</td>';         
                } elseif ($final < 50) { // Si la calificación final es menor que 50
                    $observacion = '<td class="text-center text-danger">REPROBADO</td>';
                } else {
                    $observacion = '<td class="text-center text-danger">REPROBADO</td>'; // Por defecto, se considera REPROBADO
                }

                //DATOS EN LA TABLA 
                $suma = ($suma>=70)?'<td class="text-center text-success" style="width:50px;">'.$suma.'</td>':'<td class="text-center text-danger" style="width:50px;">'.$suma.'</td>';
                $resultado = ($final>=70)?'<td class="text-center" style="width:5%;">'.number_format($final,2).'</td>'
                                        :'<td class="text-center" style="width:5%;">'.number_format($final,2).'</td>';
                $rows.='<tr style="height: 30px; border: black 0px solid; border-spacing:">
                            <td class="text-center" style="width:5%;">'.$i++.'</td>
                            <td class="text-center" style="width:9%;">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center" style="width:5%;">'.$p1.'</td>
                            <td class="text-center" style="width:5%;">'.$p2.'</td>
                            '.$suma.
                            '<td class="text-center" style="width:10%;">'.$supletorio.'</td>'
                            .$resultado
                            .$observacion
                        .'</tr>';
                
                $p1 = "";
                $p2 = "";
                $final = ""; 
                $suma = "";
                $supletorio = "";            
                $resultado = "";
                $asistencia = "";
            }

            echo json_encode($rows);
        }
    }

?>