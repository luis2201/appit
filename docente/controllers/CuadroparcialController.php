<?php

    class CuadroparcialController 
    {
        public function index()
        {
            view("cuadroparcial.index", []);
        }

        public function findmaterias()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo); 
            $idcarrera = Main::limpiar_cadena($data->idcarrera); 
            $idnivel = Main::limpiar_cadena($data->idnivel); 
            $idseccion = Main::limpiar_cadena($data->idseccion);
            $modalidad = Main::limpiar_cadena($data->modalidad);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $resp = CuadroParcial::findMaterias($idperiodo, $idcarrera, $idnivel);
            
            //Creando el encabezado para # y la lista de estudiantes
            $n = 0;
            $thead1 = '<table class="table table-stripped table-bordered table-hover" width="100%" style="border-style: solid;">
                        <thead class="bg-primary text-light" style="font-size: 0.6em;">
                            <tr>
                                <th rowspan="2" width="5%" class="text-center align-middle" style="font-size: 1.5em">#</th>
                                <th rowspan="2" width="50%" class="text-center align-middle" style="font-size: 0.2em">Nómina</th>';
            
            //Array para guardar los IDs de todas las materias y carga de los nombres de las materias como encabezados
            $idmaterias = array();
            foreach($resp as $row){
                    $n++;
                    $idmaterias [] = $row->idmateria;
                    $thead2 .= '<th colspan="3" class="text-center align-middle text-wraper">'.$row->materia.'</th>';
            }

            $thead3     = '</tr>
                           <tr>';

            //Carga de parciales
            for($i = 1; $i <= $n; $i++){
              $thead4 .=      '<th class="text-center" width="3%">P1</th>
                               <th class="text-center" width="3%">P2</th>
                               <th class="text-center" width="3%">%</th>';
            }


            $thead5     = '</tr>
                        </thead>
                        <tbody>';

            $id = 1;
            $resp = CuadroParcial::findEstudiantes($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel);
            
            foreach($resp as $row){
                $s = 1;
                $tbody1 = '<tr style="font-size: 0.9em;">
                            <td class="text-center">'.$id++.'</td>
                            <td style="font-size:0.8em">'.$row->alumnos.'</td>';
                
                for($j = 1; $j <= $n; $j++){
                    //PARCIAL 1
                    $p1 = CuadroParcial::findnotasIDEstudiante($idperiodo, $idmaterias[$j-1], 1, $row->idmatricula);
                    $tbody2 .= '<td>'.$p1[0]->total.'</td>';
                    //PARCIAL 2
                    $p2 = CuadroParcial::findnotasIDEstudiante($idperiodo, $idmaterias[$j-1], 2, $row->idmatricula);
                    $p2[0]->supletorio = ($p2[0]->supletorio>0)?$p2[0]->supletorio:"";
                    if($p2[0]->total>0){
                        $tbody2 .= '<td>'.$p2[0]->total.'</td>';
                    } else {
                        $tbody2 .= '<td></td>';
                    }
                    //ASISTENCIA
                    $params = [":idperiodo" => $idperiodo, ":idmateria" =>  $idmaterias[$j-1]];
                    $horas = count(Asistencia::findHorasClase($params)) * 2;

                    $porc = Asistencia::findAsistenciaEstudianteMateria($idmaterias[$j-1], $row->idmatricula);
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
                    $pasistencia = ($horas>0)?$asistencias * 100 / $horas:0; 

                    if($pasistencia>0){
                        $tbody2 .= '<td>'.number_format($pasistencia,2).'</td>';
                    }else{
                        $tbody2 .= '<td></td>';
                    }
                }
                
                $tbody = $tbody.$tbody1.$tbody2.'</tr>';
                $tbody1 = "";
                $tbody2 = "";
                $asistencia = "";
            }

            $footer =  '</tbody>
                      </table>';

            echo json_encode($thead1.$thead2.$thead3.$thead4.$thead5.$tbody.$footer);
            // echo json_encode($idperiodo.$idcarrera.$idnivel.$idseccion.$modalidad);
        }
    }

?>