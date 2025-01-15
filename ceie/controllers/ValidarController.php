<?php

    class ValidarController
    {

        public function index()
        {
            $periodos = Periodo::findAll();

            view("validar.index", ["periodos" => $periodos]);
        }

        public function findsolicitud()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmodulo = Main::limpiar_cadena($data->idmodulo);
            $rows = '';

            $idperiodo = Main::decryption($idperiodo);
            $idmodulo = Main::decryption($idmodulo);

            $params = [":idperiodo" => $idperiodo, ":idmodulo" => $idmodulo];
            $res = Validar::findSolicitud($params);
            foreach ($res as $row) {
                switch ($row->idmodulo) {
                    case 1:
                      $modulo = 'A1.1 (Módulo 1)';
                      break;
                    case 2:
                      $modulo = 'A1.2 (Módulo 2)';
                      break;
                    case 3:
                      $modulo = 'A2.1 (Módulo 3)';
                      break;
                    case 4:
                      $modulo = 'A2.2 (Módulo 4)';
                      break;
                }

                switch ($row->estado) {
                    case 'PENDIENTE':
                      $estado = '<span class="badge bg-secondary">'.$row->estado.'</span>';
                      break;
                    case 'INSCRITO':
                      $estado = '<span class="badge bg-primary">'.$row->estado.'</span>';
                      break;
                    case 'EXONERADO':
                      $estado = '<span class="badge bg-success">'.$row->estado.'</span>';
                      break;
                }

                if($row->estado == 'PENDIENTE'){
                    $accion = '<div class="btn-group" role="group" aria-label="Basic example">
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-success" onclick="aprobar(this.value)"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-danger" onclick="eliminar(this.value)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>';
                } else{
                    $accion = '<div class="btn-group" role="group" aria-label="Basic example">
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-danger" onclick="eliminar(this.value)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>';
                }

                $rows .= '<tr>
                            <td>'.$row->estudiante.'</td>
                            <td>'.$modulo.'</td>
                            <td>'.$estado.'</td>
                            <td>'.$accion.'</td>
                          </tr>';
            }
            echo json_encode($rows);
        }

        public function aprobar($idceie)
        {
            $data = json_decode(file_get_contents("php://input"));

            $idceie = Main::limpiar_cadena($data->idceie);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmodulo = Main::limpiar_cadena($data->idmodulo);
            $rows = '';
            
            $idceie = Main::decryption($idceie);
            $idperiodo = Main::decryption($idperiodo);
            $idmodulo = Main::decryption($idmodulo);

            $params = [":idceie" => $idceie];
            $res = Validar::Aprobar($params);

            $params = [":idperiodo" => $idperiodo, ":idmodulo" => $idmodulo];
            $res = Validar::findSolicitud($params);

            $res = Validar::findSolicitud($params);
            foreach ($res as $row) {
                switch ($row->idmodulo) {
                    case 1:
                      $modulo = 'A1.1 (Módulo 1)';
                      break;
                    case 2:
                      $modulo = 'A1.2 (Módulo 2)';
                      break;
                    case 3:
                      $modulo = 'A2.1 (Módulo 3)';
                      break;
                    case 4:
                      $modulo = 'A2.2 (Módulo 4)';
                      break;
                }

                switch ($row->estado) {
                    case 'PENDIENTE':
                      $estado = '<span class="badge bg-secondary">'.$row->estado.'</span>';
                      break;
                    case 'INSCRITO':
                      $estado = '<span class="badge bg-primary">'.$row->estado.'</span>';
                      break;
                    case 'EXONERADO':
                      $estado = '<span class="badge bg-success">'.$row->estado.'</span>';
                      break;
                }

                if($row->estado == 'PENDIENTE'){
                    $accion = '<div class="btn-group" role="group" aria-label="Basic example">
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-success" onclick="aprobar(this.value)"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-danger" onclick="eliminar(this.value)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>';
                } else{
                    $accion = '<div class="btn-group" role="group" aria-label="Basic example">
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-danger" onclick="eliminar(this.value)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>';
                }

                $rows .= '<tr>
                            <td>'.$row->periodo.'</td>
                            <td>'.$modulo.'</td>
                            <td>'.$estado.'</td>
                            <td>'.$accion.'</td>
                          </tr>';
            }

            echo json_encode($rows);
        }

        public function eliminar($idceie)
        {
            $data = json_decode(file_get_contents("php://input"));

            $idceie = Main::limpiar_cadena($data->idceie);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmodulo = Main::limpiar_cadena($data->idmodulo);
            $rows = '';
            
            $idceie = Main::decryption($idceie);
            $idperiodo = Main::decryption($idperiodo);
            $idmodulo = Main::decryption($idmodulo);

            $params = [":idceie" => $idceie];
            $res = Validar::Eliminar($params);

            $params = [":idperiodo" => $idperiodo, ":idmodulo" => $idmodulo];
            $res = Validar::findSolicitud($params);

            $res = Validar::findSolicitud($params);
            foreach ($res as $row) {
                switch ($row->idmodulo) {
                    case 1:
                      $modulo = 'A1.1 (Módulo 1)';
                      break;
                    case 2:
                      $modulo = 'A1.2 (Módulo 2)';
                      break;
                    case 3:
                      $modulo = 'A2.1 (Módulo 3)';
                      break;
                    case 4:
                      $modulo = 'A2.2 (Módulo 4)';
                      break;
                }

                switch ($row->estado) {
                    case 'PENDIENTE':
                      $estado = '<span class="badge bg-secondary">'.$row->estado.'</span>';
                      break;
                    case 'INSCRITO':
                      $estado = '<span class="badge bg-primary">'.$row->estado.'</span>';
                      break;
                    case 'EXONERADO':
                      $estado = '<span class="badge bg-success">'.$row->estado.'</span>';
                      break;
                }

                if($row->estado == 'PENDIENTE'){
                    $accion = '<div class="btn-group" role="group" aria-label="Basic example">
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-success" onclick="aprobar(this.value)"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-danger" onclick="eliminar(this.value)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>';
                } else{
                    $accion = '<div class="btn-group" role="group" aria-label="Basic example">
                                    <button value="'.Main::encryption($row->idceie).'" class="btn btn-sm btn-outline-danger" onclick="eliminar(this.value)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>';
                }

                $rows .= '<tr>
                            <td>'.$row->periodo.'</td>
                            <td>'.$modulo.'</td>
                            <td>'.$estado.'</td>
                            <td>'.$accion.'</td>
                          </tr>';
            }

            echo json_encode($rows);
        }

    }

?>