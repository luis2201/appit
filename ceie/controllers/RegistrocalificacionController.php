<?php

    class RegistrocalificacionController
    {
        public function index()
        {
            $periodos = Periodo::findAll();

            view("registrocalificacion.index", ["periodos" => $periodos]);
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
                $observacion = ($row->calificacion>=70)?'<input id="o-'.$row->idceie.'" type="text" style="border-style:none; width: 100px;" class="text-success text-center" value="APROBADO" disabled>':'<input id="o-'.$row->idceie.'" type="text" style="border-style:none; width: 100px;" class="text-danger text-center" value="REPROBADO" disabled>';
                $rows .=    '<tr style="height:30px; padding:0px;">
                                <td class="text-center" style="padding: 0; width:5%">'.$i++.'</td>
                                <td style="padding: 0; width="75%">'.$row->estudiante.'</td>
                                <td class="text-center" style="padding: 0; width:10%"><input id="id-'.$row->idceie.'" class="form-control text-center" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" oninput="calificacion(this.id);" onkeypress="return filterFloat(event,this);" value="'.number_format($row->calificacion,2).'" style="height:30px; width:100%"></td>
                                <td class="text-center" style="padding: 0; width:10%">'.$observacion.'</td>
                            </tr>';
            }

            $tfoot =    '</tbody>
                    </table>';

            echo json_encode($thead.$rows.$tfoot);
        }

        public function save()
        {
            $data = json_decode(file_get_contents("php://input"));
            $idceie = Main::limpiar_cadena($data->idceie);
            $calificacion = number_format(Main::limpiar_cadena($data->calificacion), 2);

            $params = [":idceie" => $idceie, ":calificacion" => $calificacion];
            $resp = Registrocalificacion::Save($params);

            echo json_encode($resp);
        }
    }

?>