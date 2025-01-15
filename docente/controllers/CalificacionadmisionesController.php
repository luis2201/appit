<?php

    class CalificacionadmisionesController
    {
        public function index()
        {                     
            $periodos = Periodo::findAll();
            foreach ($periodos as $row) {
                $idperiodo = $row->idperiodo;
            }
            
            $params = [":idperiodo" => $idperiodo, ":iddocente" => $_SESSION['idusuario_appit']];            
            $modulos  = Modulo::findIdDocente($params);

            view("calificacionadmisiones.index", ["periodos" => $periodos, "modulos" => $modulos]);
        }

        public function viewlistaestudiante(){
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmodulo = Main::limpiar_cadena($data->idmodulo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            
            $idperiodo = Main::decryption($data->idperiodo);
            $idmodulo = Main::decryption($data->idmodulo);            
            $iddocente = Main::decryption($data->iddocente);            

            $thead= '<table id="tbLista" class="table table-bordered table-striped" id="tbLista" width="100%" cellspacing="0" style="border-collapse:collapse; border: none; font-size:0.8em">
                        <thead class="bg-primary text-light">
                            <tr class="text-center">
                                <td class="align-middle" rowspan="2">#</td>
                                <td class="align-middle" rowspan="2">Estudiante</td>
                                <td class="align-middle" colspan="3">Calificación</td>
                                <td class="align-middle" rowspan="2">Suma</td>
                                <td class="align-middle" rowspan="2">Observación</td>
                            </tr>
                            <tr class="text-center align-middle">
                                <td>Foros (5p.)</td>
                                <td>Tareas (5p.)</td>
                                <td>Examen (10  p.)</td>
                            </tr>
                        </thead>
                        <tbody>';
            $rows = '';
            $i = 1; 

            $params = [":idperiodo" => $idperiodo];
            $resp = Calificacionadmisiones::ViewListaEstudiante($params);

            $foros = "";
            $tareas = "";
            $examen = "";
            $suma = "";

            foreach ($resp as $row) {                
                $params = [":idperiodo" => $idperiodo, ":idmodulo" => $idmodulo, ":idadmisiones" => $row->idadmisiones];                            
                $calificaciones = Calificacionadmisiones::FindCalificacionIdAdmisiones($params);                   
                foreach($calificaciones as $cal){
                    $foros = $cal->foros;
                    $tareas = $cal->tareas;
                    $examen = $cal->examen;                    
                    $suma = $cal->suma;                    
                }
                //$observacion = ($row->calificacion>=70)?'<span class="text-success">APROBADO</span>':'<span class="text-danger">REPROBADO</span>';
                $rows .=    '<tr style="height:30px; padding:0px;">
                                <td class="text-center align-middle" style="padding: 0; width:5%">'.$i++.'</td>
                                <td class="align-middle" style="padding: 0; width="75%">'.$row->estudiante.'</td>
                                <td class="text-center" style="padding: 0; width:10%"><input id="f-'.$row->idadmisiones.'" class="form-control text-center" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" oninput="calificacion(this.id);" onkeypress="return filterFloat(event,this);" value="'.number_format($foros,2).'" style="font-size:0.9em;height:30px; width:100%"></td>
                                <td class="text-center" style="padding: 0; width:10%"><input id="t-'.$row->idadmisiones.'" class="form-control text-center" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" oninput="calificacion(this.id);" onkeypress="return filterFloat(event,this);" value="'.number_format($tareas,2).'" style="font-size:0.9em;height:30px; width:100%"></td>
                                <td class="text-center" style="padding: 0; width:10%"><input id="e-'.$row->idadmisiones.'" class="form-control text-center" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" oninput="calificacion(this.id);" onkeypress="return filterFloat(event,this);" value="'.number_format($examen,2).'" style="font-size:0.9em;height:30px; width:100%"></td>
                                <td class="text-center" style="padding: 0; width:10%"><input id="s-'.$row->idadmisiones.'" class="form-control text-center" value="'.number_format($suma,2).'" style="background-color: #ccc; font-size:0.9em; font-weight:bold; height:30px; width:100%" disabled></td>
                                <td class="text-center" style="padding: 0; width:10%"></td>
                            </tr>';
                
                $foros = "";
                $tareas = "";
                $examen = "";
                $suma = "";
            }

            $tfoot =    '</tbody>
                    </table>';

            echo json_encode($thead.$rows.$tfoot);            
        }

        public function save()
        {
            $data = json_decode(file_get_contents("php://input"));
            
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmodulo = Main::limpiar_cadena($data->idmodulo);
            $idadmisiones = Main::limpiar_cadena($data->idadmisiones);
            $parametro = Main::limpiar_cadena($data->parametro);
            $calificacion = number_format(Main::limpiar_cadena($data->calificacion), 2);

            $idperiodo = Main::decryption($idperiodo);
            $idmodulo = Main::decryption($idmodulo);

            $params = [":idperiodo" => $idperiodo, ":idmodulo" => $idmodulo, ":idadmisiones" => $idadmisiones, ":parametro" => $parametro, ":calificacion" => $calificacion];
            $resp = Calificacionadmisiones::Save($params);

            echo json_encode($resp);
        }
    }

?>