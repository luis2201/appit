<?php

    class CalificacionesController
    {
        public function index()
        {
            $periodos = Periodo::findAll();
            $carreras = Carrera::findAll();

            view('calificaciones.index', ["periodos" => $periodos, "carreras" => $carreras]);
        }

        public function findcalificacionesidmatricula()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idmatricula = Main::decryption($idmatricula);

            $param = ["idmatricula" => $idmatricula];
            $resp = Materiaintroductorio::findMateriaIdMatricula($param);

            $i = 1;
            $thead = '<table class="table table-condensed table-hover" style="width:100%; font-size:0.8em;">
                        <thead class="bg-secondary text-light">
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:45%">MATERIA</th>
                                <th class="text-center">TD</th>
                                <th class="text-center">TP</th>
                                <th class="text-center">TA</th>
                                <th class="text-center">TR</th>
                                <th class="text-center">P1</th>
                                <th class="text-center">TD</th>
                                <th class="text-center">TP</th>
                                <th class="text-center">TA</th>
                                <th class="text-center">TR</th>
                                <th class="text-center">P2</th>
                            </tr>
                        </thead>
                        <tbody>';
            $tbody = '';
            foreach($resp as $row){
                $param = [":idmatricula" => $idmatricula, ":idmateria" => $row->idmateria, ":idparcial" => 1];
                $parcial1 = Calificaciones::findCalificacionParcial($param);

                if(count($parcial1) > 0){
                    foreach($parcial1 as $cal){
                        $tdocencia1 = $cal->tdocencia;
                        $tpractica1 = $cal->tpractica;
                        $taprendizaje1 = $cal->taprendizaje;
                        $tresultado1 = $cal->tresultado;
                        $total1 = $cal->total;
                    }
                } else {
                    $tdocencia1 = "";
                    $tpractica1 = "";
                    $taprendizaje1 = "";
                    $tresultado1 = "";
                    $total1 = "";
                }

                $param = [":idmatricula" => $idmatricula, ":idmateria" => $row->idmateria, ":idparcial" => 2];
                $parcial2 = Calificaciones::findCalificacionParcial($param);
                if(count($parcial2) > 0){
                    foreach($parcial2 as $cal){
                        $tdocencia2 = $cal->tdocencia;
                        $tpractica2 = $cal->tpractica;
                        $taprendizaje2 = $cal->taprendizaje;
                        $tresultado2 = $cal->tresultado;
                        $total2 = $cal->total;
                    }
                } else {
                    $tdocencia2 = "";
                    $tpractica2 = "";
                    $taprendizaje2 = "";
                    $tresultado2 = "";
                    $total2 = "";
                }

                $tbody .= '<tr>
                            <td>'.$i++.'</td>
                            <td>'.$row->materia.'</td>
                            <td class="text-center">'.$tdocencia1.'</td>
                            <td class="text-center">'.$tpractica1.'</td>
                            <td class="text-center">'.$taprendizaje1.'</td>
                            <td class="text-center">'.$tresultado1.'</td>
                            <td class="bg-secondary text-light text-center">'.$total1.'</td>
                            <td class="text-center">'.$tdocencia2.'</td>
                            <td class="text-center">'.$tpractica2.'</td>
                            <td class="text-center">'.$taprendizaje2.'</td>
                            <td class="text-center">'.$tresultado2.'</td>
                            <td class="bg-secondary text-light text-center">'.$total2.'</td>
                          </tr>';
            }
            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }
    }