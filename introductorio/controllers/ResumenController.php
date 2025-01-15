<?php

    class ResumenController
    {
        public function index()
        {
            $idmatricula = Main::decryption($_SESSION["idestudiante_appit"]);

            view("resumen.index", []);
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
            $i = 1;
            $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula];
            $resp = Resumen::findMaterias($params);      
            foreach($resp as $materias)
            {                        
                $resp = Resumen::findParcial([":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria, ":idparcial" => 1]);
                foreach ($resp as $parcial1) {
                    $p1 = ($parcial1->total>0)?number_format($parcial1->total, 2):"";
                }

                $resp = Resumen::findParcial([":idmatricula" => $idmatricula, ":idmateria" => $materias->idmateria, ":idparcial" => 2]);
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

                //OBSERVACIÓN             
                if($final>=70){                
                    $observacion = '<td class="text-center">APROBADO</td>';
                } elseif ($final>=50) {
                    $observacion = '<td class="text-center text-success">SUPLETORIO</td>';            
                } else{
                    $observacion = '<td class="text-center text-danger">REPROBADO</td>';
                }

                if($final == 0){
                    $observacion = '<td></td>';
                }

                $rows.= '<tr>
                        <td class="text-center">'.$i++.'</td>
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
                $final = '';
                $observacion = '';
            }

            print_r($rows);
        }
  
    }

?>