<?php

    class LeccionarioController
    {
        public function index()
        {
            $carreras = Carrera::findAll();

            view('leccionario.index', ["carreras" => $carreras]);
        }

        public function validaasistenciafecha()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $fecha     = $data->fecha;

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":fecha" => $fecha];
            $res = Leccionario::ValidaAsistenciaFecha($params);

            echo json_encode($res);
        }

        public function insert()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $fecha = Main::limpiar_cadena($data->fecha);
            $unidad = Main::limpiar_cadena($data->unidad);
            $actividades = Main::limpiar_cadena($data->actividades);
            $tareas = Main::limpiar_cadena($data->tareas);

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria, ":fecha" => $fecha, ":unidad" => $unidad, ":actividades" => $actividades, ":tareas" => $tareas];
            $resp = Leccionario::Insert($params);

            echo json_encode($resp);
        }

        public function viewactividades()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            
            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $param = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
            $resp = Leccionario::viewActividades($param);

            $thead = '<table class="table table-striped" style="width:100%; font-size:11px;">
                        <thead class="bg-primary text-light text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Unidad</th>
                                <th scope="col">Actividades</th>
                                <th scope="col">Tareas</th>
                            </tr>
                        </thead>';

            $i = 1;
            $rows = '';
            foreach($resp as $row){
                $rows .= '<tr>
                            <td class="text-center" style="width:5%">'.$i++.'</td>
                            <td class="text-center" style="width:8%">'.$row->fecha.'</td>
                            <td style="width:27%">'.$row->unidad.'</td>
                            <td style="width:30%">'.$row->actividades.'</td>
                            <td style="width:30%">'.$row->tareas.'</td>
                          </tr>';
            }

            $tfoot = "</table>";
            
            echo json_encode($thead . $rows . $tfoot);
        }

    }

?>