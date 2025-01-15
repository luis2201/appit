<?php

    class CalificacionescarreraController
    {

        public function index()
        {
            $periodos = Periodo::findAll();
            $carreras = Carrera::findAll();

            view('calificacionescarrera.index', ["periodos" => $periodos, "carreras" => $carreras]);
        }

        public function viewcalificacionidcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            
            $thead1 = '<table class="table table-hover" style="font-size:0.8em;">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">NÓMINA DE ESTUDIANTES</th>';

            $cols = 0;
            $materias = array();
            $thead2 = '';
            $param = [":idcarrera" => $idcarrera];
            $res = Materiaintroductorio::findMateriaIdCarrera($param);
            foreach ($res as $row) {
                $cols = $cols + 1;
                array_push($materias, $row->idmateria);
                $thead2 .= '<th class="align-middle text-center" style="width:180px">'.$row->materia.'</th>';
            }

            $thead3 = '        </tr>
                            </thead>
                            <tbody>';

            $thead = $thead1.$thead2.$thead3;

            $i = 1;
            $rows = '';
            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $res = Estudiante::findEstudianteIdCarrera($param);

            foreach($res as $row){
                $col = '';
                for($c = 1; $c <= $cols; $c++){
                    $param = [":idmatricula" => $row->idmatricula, ":idmateria" => $materias[$c-1], ":idparcial" => 1];
                    $parcial = Calificaciones::findCalificacionParcial($param);
                    foreach($parcial as $nota){
                        $p1 = $nota->total;
                    }

                    $param = [":idmatricula" => $row->idmatricula, ":idmateria" => $materias[$c-1], ":idparcial" => 2];
                    $parcial = Calificaciones::findCalificacionParcial($param);
                    
                    foreach($parcial as $nota){
                        $p2 = $nota->total;
                    }

                    $total = ($p1+$p2 > 0)?number_format($p1+$p2,2):'';
                    $col .= '<td class="text-center">'.$total.'</td>';

                    $p1 = '';
                    $p2 = '';
                    $total = '';
                }

                $rows .= '<tr>
                            <td>'.$i++.'</td>
                            <td>'.$row->apellidos.' '.$row->nombres.'</td>'
                            .$col.
                          '</tr>';  
            }
            
            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead.$rows.$tfoot);
        }

    }

?>

