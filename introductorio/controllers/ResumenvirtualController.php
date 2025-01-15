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
  
    }

?>