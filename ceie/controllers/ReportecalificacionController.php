<?php

    class ReportecalificacionController
    {

        public function index()
        {
            $periodos = Periodo::findAll();

            view('reportecalificacion.index', ["periodos" => $periodos]);
        }

        public function viewlistaestudiante(){
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmodulo = Main::limpiar_cadena($data->idmodulo);

            $idperiodo = Main::decryption($data->idperiodo);
            $idmodulo = Main::decryption($data->idmodulo);            

            $thead= '<table id="tbLista" class="table table-bordered table-striped" id="tbLista" width="100%" cellspacing="0" style="border-collapse:collapse; border: none;">
                        <thead class="bg-primary text-light">
                            <tr class="text-center">
                                <td>#</td>
                                <td>Estudiante</td>
                                <td>Calificación</td>
                                <td>Observación</td>
                            </tr>
                        </thead>
                        <tbody>';
            $rows = '';
            $i = 1; 

            $params = [":idperiodo" => $idperiodo, ":idmodulo" => $idmodulo];
            $resp = Registrocalificacion::ViewListaEstudiante($params);
            
            foreach ($resp as $row) {
                $observacion = ($row->calificacion>=70)?'<span>APROBADO</span>':'<span class="text-danger">REPROBADO</span>';
                $rows .=    '<tr style="height:30px; padding:0px;">
                                <td class="text-center" style="padding: 0; width:5%">'.$i++.'</td>
                                <td style="padding: 0; width="75%">'.$row->estudiante.'</td>
                                <td class="text-center" style="padding: 0; width:10%">'.number_format($row->calificacion,2).'</td>
                                <td class="text-center" style="padding: 0; width:10%">'.$observacion.'</td>
                            </tr>';
            }

            $tfoot =    '</tbody>
                    </table>';

            echo json_encode($thead.$rows.$tfoot);
        }
    }

?>