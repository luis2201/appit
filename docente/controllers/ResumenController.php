<?php

    class ResumenController
    {
        public function index()
        {
            view("resumen.index", []);
        }

        public function viewlistaestudiantemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);        
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);

            $res = Registrocalificacion::viewListaEstudianteMateria($idperiodo, $idmateria);        
            $i=1;
            $rows = '';
            foreach($res as $row){
                $parciales = Registrocalificacion::findcalificacionidmatricula($row->idmatricula, $idperiodo, $idmateria, 1);
                foreach($parciales as $parcial)
                {
                    $p1 = $parcial->total;  
                }

                $parciales = Registrocalificacion::findcalificacionidmatricula($row->idmatricula, $idperiodo, $idmateria, 2);
                foreach($parciales as $parcial)
                {
                    $p2 = $parcial->total;
                    $supletorio = ($parcial->supletorio>0)?number_format(round($parcial->supletorio),2):"";
                }

                $suma = number_format($p1+$p2,2);
                
                $final = $suma;
                if($suma>=56 && $suma<=69.9){
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

                //ASISTENCIA
                $params = [":idperiodo" => $idperiodo, ":idmateria" =>  $idmateria];
                $horas = count(Asistencia::findHorasClase($params)) * 2;

                $porc = Asistencia::findAsistenciaEstudianteMateria($idmateria, $row->idmatricula);
                
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
                $asistencia = ($pasistencia>=75)?'<td class="text-center">'.$pasistencia.'</td>':'<td class="text-center text-danger">'.$pasistencia.'</td>';

                //OBSERVACIÓN             
                if ($final >= 70 && $pasistencia >= 75) {                
                    $observacion = '<td class="text-center">APROBADO</td>';
                } elseif ($final >= 70 && $pasistencia < 75) {
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
                $rows.='<tr style="height: 30px; border: black 0px solid; font-size:0.65vw">
                            <td class="text-center" style="width:5%;">'.$i++.'</td>
                            <td class="text-center" style="width:9%;">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center" style="width:5%;">'.$p1.'</td>
                            <td class="text-center" style="width:5%;">'.$p2.'</td>
                            '.$suma.
                            '<td class="text-center" style="width:10%;">'.$supletorio.'</td>'
                            .$resultado.
                            $asistencia.
                            $observacion.
                        '</tr>';
                
                $p1 = "";
                $p2 = "";
                $final = ""; 
                $suma = "";
                $horas = "";
                $asistencias = "";
                $asistencias = "";
                $pasistencia = "";
                $supletorio = "";            
                $resultado = "";
                $asistencia = "";
            }

            echo json_encode($rows);
        }
        
        public function findcalificacionidmatricula()
        {
        $data = json_decode(file_get_contents('php://input'));

        $idmatricula = Main::limpiar_cadena($data->idmatricula);
        $idperiodo = Main::limpiar_cadena($data->idperiodo);
        $idmateria = Main::limpiar_cadena($data->idmateria);
        $idparcial = Main::limpiar_cadena($data->idparcial);
        
        $idperiodo = Main::decryption($idperiodo);
        
        $res = Supletorio::findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial);

        echo json_encode($res);
        }

    }  

?>


