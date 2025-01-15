<?php

    class MatriculadosporsexovalidacionController
    {
        public function index()
        {
            $periodostodos = Periodo::findActivo();

            view('matriculadosporsexovalidacion.index', ["periodostodos" => $periodostodos]);
        }


        public function findsexovalidacionidperiodo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $thead = '<table id="tbLista" class="table table-hover">
                        <thead class="bg-primary text-light text-center">
                        <tr>
                            <th>#</th>
                            <th>Carrea</th>
                            <th>Nº Hombres</th>
                            <th>Nº Mujeres</th>
                        </tr>
                        </thead>
                        <tbody>';
            $tbody = '';
            $i = 1;
            $masculinosum = 0;
            $femeninosum = 0;

            $param = [":idperiodo" => $idperiodo];
            $resp = Carrera::findCarreraPeriodo($param);
            foreach($resp as $row){
                $param = [":idperiodo" => $idperiodo, ":idcarrera" => $row->idcarrera];
                $resp = Matriculadosporsexo::findSexoValidacionIdPeriodo($param);
                
                foreach($resp as $estadistica){
                    $masculino = $estadistica->masculino;
                    $femenino = $estadistica->femenino;
                }

                $tbody.='<tr>
                            <td>'.$i++.'</td>
                            <td>'.$row->carrera.'</td>
                            <td class="text-center">'.$masculino.'</td>
                            <td class="text-center">'.$femenino.'</td>
                        </tr>';

                $masculinosum = $masculinosum + $masculino;
                $femeninosum = $femeninosum + $femenino;
            }

            $tfoot =   '</tbody>
                        <tfoot class="bg-secondary text-light">
                        <tr>
                            <td colspan="2" class="text-end fw-bold">TOTAL</td>
                            <td class="text-center fw-bold">'.$masculinosum.'</td>
                            <td class="text-center fw-bold">'.$femeninosum.'</td>
                        </tr>
                        </tfoot>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

    }

?>