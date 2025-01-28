<?php

    class ResumenvirtualController
    {
        public function index()
        {
            $idmatricula = Main::decryption($_SESSION["idestudiante_appit"]);

            view("resumenvirtual.index", []);
        }
        
        public function viewcalificacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idestudiante = Main::limpiar_cadena($data->idestudiante);

            $idestudiante = Main::decryption($idestudiante);
            
            $resp = Resumen::findIdMatricula([":idperiodo" => $idperiodo, ":idestudiante" => $idestudiante]);
            foreach ($resp as $row) {
                $idmatricula = $row->idmatricula;
            }

            $resp = Resumen::findNivelCarrera([":idperiodo" => $idperiodo, ":idestudiante" => $idestudiante]);
            foreach ($resp as $row) {
                $nivel = $row->nivel;
                $carrera = $row->carrera;
            }
            
            $rows = '';

            $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula];
            $resp = Resumen::findMaterias($params);      
            foreach($resp as $materias)
            {        
                $resp = Resumen::findVirtual([":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria]);
                foreach ($resp as $row) {
                    $tdocencia = ($row->tdocencia>0)?number_format($row->tdocencia, 2):"";
                    $tpractica = ($row->tpractica>0)?number_format($row->tpractica, 2):"";
                    $taprendizaje = ($row->taprendizaje>0)?number_format($row->taprendizaje, 2):"";
                    $tresultado = ($row->tresultado>0)?number_format($row->tresultado, 2):"";
                    $t = ($row->total>0)?number_format($row->total, 2):"";
                }

                $total = $t;

                $observacion = ($total>=70)?'<strong class="text-dark">APROBADO</strong>':'<strong class="text-danger">REPROBADO</strong>';
                $rows.= '<tr>
                        <td class="text-center">'.$materias->codigo.'</td>
                        <td class="text-left">'.$materias->materia.'</td>
                        <td class="text-center">'.$tdocencia.'</td>
                        <td class="text-center">'.$tpractica.'</td>
                        <td class="text-center">'.$taprendizaje.'</td>
                        <td class="text-center">'.$tresultado.'</td>
                        <td class="text-center">'.$total.'</td>                 
                        <td class="text-center">'.$observacion.'</td>                  
                        </tr>';
            }

            echo json_encode($rows);
        }

        public function viewcalificaciones()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idestudiante = Main::limpiar_cadena($data->idestudiante);

            $idestudiante = Main::decryption($idestudiante);
            $idperiodo = Main::decryption($idperiodo);
            
            $resp = Resumen::findIdMatricula([":idperiodo" => $idperiodo, ":idestudiante" => $idestudiante]);
            foreach ($resp as $row) {
                $idmatricula = $row->idmatricula;
            }

            $resp = Resumen::findNivelCarrera([":idperiodo" => $idperiodo, ":idestudiante" => $idestudiante]);
            foreach ($resp as $row) {
                $nivel = $row->nivel;
                $carrera = $row->carrera;
            }
            
            $rows = '';

            $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula];
            $resp = Resumen::findMaterias($params);      
            foreach($resp as $materias)
            {                        
                $resp = Resumen::findVirtuales([":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria, ":idparcial" => 1]);
                foreach ($resp as $parcial1) {
                    $p1 = ($parcial1->total>0)?number_format($parcial1->total, 2):"";
                }

                $resp = Resumen::findVirtuales([":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria, ":idparcial" => 2]);
                foreach ($resp as $parcial2) {
                    $p2 = ($parcial2->total>0)?number_format($parcial2->total, 2):"";
                    $supletorio = ($parcial2->supletorio>0)?number_format(round($parcial2->supletorio), 2):"";
                }            

                $t = (($p1+$p2)>0) ? number_format($p1+$p2, 2) : "";
                $final = $t;
                if($t>=56 && $t<=69){
                    if($supletorio>=14){
                    $final = $t + $supletorio;
                    if($final>70){
                        $final = number_format(70,2);
                    }
                    } else{
                    $final = $t;
                    }
                } elseif ($t>=55) {
                    if($supletorio>=15){
                    $final = $t + $supletorio;
                    if($final>70){
                        $final = number_format(70,2);
                    }
                    } else{
                    $final = $t;
                    }
                } elseif ($t>=54) {
                    if($supletorio>=16){
                    $final = $t + $supletorio;
                    if($final>70){
                        $final = number_format(70,2);
                    }
                    } else{
                    $final = $t;
                    }
                } elseif ($t>=53) {
                    if($supletorio>=17){
                    $final = $t + $supletorio;
                    if($final>70){
                        $final = number_format(70,2);
                    }
                    } else{
                    $final = $t;
                    }
                } elseif ($t>=52) {
                    if($supletorio>=18){
                    $final = $t + $supletorio;
                    if($final>70){
                        $final = number_format(70,2);
                    }
                    } else{
                    $final = $t;
                    }
                } elseif ($t>=51) {
                    if($supletorio>=19){
                    $final = $t + $supletorio;
                    if($final>70){
                        $final = number_format(70,2);
                    }
                    } else{
                    $final = $t;
                    }
                } elseif ($t>=50) {
                    if($supletorio>=20){
                    $final = number_format($t + $supletorio,2);
                    if($final>70){
                        $final = number_format(70,2);
                    }
                    } else{
                    $final = $t;
                    }
                }                

                $params = [":idperiodo" => $idperiodo, ":idmateria" => $materias->idmateria];
                $horas = count(Asistencia::findHorasClase($params)) * 2;

                // $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria];
                // $res = Asistencia::findAsistenciasIdMatricula($params);
                
                // $asistencias = 0;
                // $inasistencias = 0;
                // foreach($res as $asis){                    
                //     if($asis->asistencia == 100){                        
                //         $asistencias += 2;
                //     } elseif($asis->asistencia == 50){
                //         $asistencias += 1;
                //     } else{
                //         $asistencia = 0;
                //     }
                // }

                // $inasistencias = $horas - $asistencias;
                
                // $pasistencia = ($horas>0)?$asistencias * 100 / $horas:0; 

                // if($final>=70 && $pasistencia>=75){
                //     $observacion = '<strong class="text-dark">APROBADO</strong>';
                // } else {
                //     $observacion = '<strong class="text-danger">REPROBADO</strong>';
                // }

                 //OBSERVACIÓN             
                if($final>=70){                
                    $observacion = '<td class="text-center">APROBADO</td>';
                } elseif ($final>=50) {
                    $observacion = '<td class="text-center text-success">SUPLETORIO</td>';            
                } else{
                    $observacion = '<td class="text-center text-danger">REPROBADO</td>';
                }

                if($final == 0 && $pasistencia == 0){
                    $pasistencia = '';
                    $observacion = '<td></td>';
                }

                $rows.= '<tr>
                        <td class="text-center">'.$materias->codigo.'</td>
                        <td>'.$materias->materia.'</td>
                        <td class="text-center">'.$p1.'</td>
                        <td class="text-center">'.$p2.'</td>
                        <td class="text-center">'.$supletorio.'</td>
                        <td class="text-center">'.$final.'</td>                                         
                        '.$observacion.'  
                        </tr>';
                
                $p1 = '';
                $p2 = '';
                $final = '';
                $horas = '';
                $pasistencia = '';
                $asistencias = 0;
                $supletorio = '';
                $inasistencias = '';
                $final = '';
                $observacion = '';
            }

            echo json_encode($rows);
        }
  
    }

?>