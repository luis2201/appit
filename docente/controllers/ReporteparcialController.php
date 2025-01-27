<?php

    class ReporteparcialController
    {
        public function index()
        {
            view("reporteparcial.index", []);
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

            $resp = Cuadrogeneral::findMaterias($idperiodo, $idcarrera, $idnivel);

            //Creando el encabezado para # y la lista de estudiantes
            $n = 0;
            $thead1 = '<table class="table table-stripped table-bordered table-hover" width="100%" style="border-style: solid;">
                        <thead class="bg-primary text-light" style="font-size: 0.7em;">
                            <tr>
                                <th rowspan="2" width="5%" class="text-center align-middle" style="font-size: 1.5em">#</th>
                                <th rowspan="2" width="50%" class="text-center align-middle" style="font-size: 1.5em">Nómina</th>';
            
            //Array para guardar los IDs de todas las materias y carga de los nombres de las materias como encabezados
            $idmaterias = array();
            foreach($resp as $row){
                    $n++;
                    $idmaterias [] = $row->idmateria;
                    $thead2 .= '<th colspan="4" class="text-center align-middle text-wraper">'.$row->materia.'</th>';
            }

            $thead3     = '</tr>
                           <tr>';

            //Carga de parciales
            for($i = 1; $i <= $n; $i++){
              $thead4 .=      '<th width="1%">P1</th>
                               <th width="1%">P2</th>
                               <th width="1%">SUP</th>
                               <th width="1%">TOTAL</th>';
            }


            $thead5     = '</tr>
                        </thead>
                        <tbody>';

            $id = 1;
            $resp = Cuadrogeneral::findEstudiantes($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel);
            
            foreach($resp as $row){
                $s = 1;
                $tbody1 = '<tr style="font-size: 0.8em;">
                            <td class="text-center">'.$id++.'</td>
                            <td>'.$row->alumnos.'</td>';
                
                for($j = 1; $j <= $n; $j++){
                    //PARCIAL 1
                    $p1 = Cuadrogeneral::findnotasIDEstudiante($idperiodo, $idmaterias[$j-1], 1, $row->idmatricula);
                    $tbody2 .= '<td>'.$p1[0]->total.'</td>';
                    //PARCIAL 2
                    $p2 = Cuadrogeneral::findnotasIDEstudiante($idperiodo, $idmaterias[$j-1], 2, $row->idmatricula);
                    $tbody2 .= '<td>'.$p2[0]->total.'</td>';
                    //SUPLETORIO
                    //$sup
                    $tbody2 .= '<td></td>';
                    //TOTAL
                    $t = ($p1[0]->total+$p2[0]->total>0) ? number_format($p1[0]->total+$p2[0]->total, 2) : "";
                    $tbody2 .= '<td>'.$t.'</td>';
                }
                
                $tbody = $tbody.$tbody1.$tbody2.'</tr>';
                $tbody1 = "";
                $tbody2 = "";
            }

            $footer =  '</tbody>
                      </table>';

            echo json_encode($thead1.$thead2.$thead3.$thead4.$thead5.$tbody.$footer);
        }
    
    }

?>