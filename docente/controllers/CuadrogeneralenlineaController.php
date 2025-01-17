<?php

    class CuadrogeneralenlineaController
    {
        public function index()
        {            
            view('cuadrogeneralenlinea.index', []);
        }

        public function findestudianteidmateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo); 
            $idcarrera = Main::limpiar_cadena($data->idcarrera); 
            $idnivel = Main::limpiar_cadena($data->idnivel);             

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $resp = Cuadrogeneralenlinea::findMaterias($idperiodo, $idcarrera, $idnivel);

            //Creando el encabezado para # y la lista de estudiantes
            $n = 0;
            $thead1 = '<table class="table table-stripped table-bordered table-hover" width="100%" style="border-style: solid;">
                        <thead class="bg-primary text-light" style="font-size: 0.7em;">
                            <tr>
                                <th rowspan="2" width="5%" class="text-center align-middle">#</th>
                                <th rowspan="2" width="50%" class="text-center align-middle">Nómina</th>';
            
            //Array para guardar los IDs de todas las materias y carga de los nombres de las materias como encabezados
            $idmaterias = array();
            foreach($resp as $row){
                    $n++;
                    $idmaterias [] = $row->idmateria;
                    $thead2 .= '<th colspan="1" class="text-center align-middle text-wraper">'.$row->materia.'</th>';
            }

            $thead3     = '</tr>                           
                        </thead>
                        <tbody>';

            $id = 1;
            $resp = CuadrogeneralEnLinea::findEstudiantes($idperiodo, $idcarrera, $idnivel);
            
            foreach($resp as $row){
                $s = 1;
                $tbody1 = '<tr style="font-size: 0.9em;">
                            <td class="text-center">'.$id++.'</td>
                            <td>'.$row->alumnos.'</td>';
                
                for($j = 1; $j <= $n; $j++){                         
                    //SUMA                              
                    $p = Cuadrogeneralenlinea::findnotasIDEstudiante($idperiodo, $idmaterias[$j-1], $row->idmatricula);                     
                    $p[0]->total = ($p[0]->total>0)?$p[0]->total:"";

                    $tbody2 .= '<td class="text-center">'.$p[0]->total.'</td>';                    
                }
                
                $tbody = $tbody.$tbody1.$tbody2.'</tr>';
                $tbody1 = "";
                $tbody2 = "";
            }

            $footer =  '</tbody>
                      </table>';

            echo json_encode($thead1.$thead2.$thead3.$thead4.$thead5.$tbody.$footer);
            // echo json_encode($idperiodo.$idcarrera.$idnivel.$idseccion.$modalidad);
        }
    }

?>