<?php

    class RegistromatriculaController
    {
        public function index()
        {
            $estudiantes = Estudiante::findAll();
            $periodo = Periodo::findActivo();
            $carreras = Carrera::findAll();
            $niveles = Nivel::findAll();

            view("registromatricula.index", ["estudiantes" => $estudiantes, "periodo" => $periodo, "carreras" => $carreras, "niveles" => $niveles]);
        }
        
        public function insert()
        {
            $data = json_decode(file_get_contents("php://input"));

            $tabla = '';
            $thead = '';
            $rows = '';
            $tfoot = '';

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);
            $modalidad = Main::limpiar_cadena($data->modalidad);

            $idestudiante = Main::decryption($idestudiante);
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);

            $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel, ":modalidad" => $modalidad, ":estado" => 1];
            $resp = Registromatricula::Insert($params);
            if($resp){
                $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
                $resp = Materias::findAllMateriaPeriodoCarrera($params);

                $thead .= '<table id="tbMaterias" class="table table-hover table-collapse table-striped">
                            <thead class="text-center thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Materia</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
                
                foreach($resp as $row){
                    $rows .= '<tr>
                                <td class="text-center">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td class="text-center">
                                    <button id="'.Main::encryption($row->idmateria).'" class="btn btn-success btn-sm" onclick="agregarMateria(this.id)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                </td>
                              </tr>';
                }

                $tfoot .= '</tbody>
                        </table>';
            }
            
            $tabla = $thead . $rows . $tfoot;

            echo json_encode($tabla);
        }

        public function agregaMateria()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idestudiante = Main::decryption($idestudiante);
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idmateria = Main::decryption($idmateria);

            $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo];
            $resp = Registromatricula::findIdMatricula($params);

            $tabla = '';
            $thead = '';
            $rows = '';
            $tfoot = '';

            foreach($resp as $row){
                $idmatricula = $row->idmatricula;
            }

            $params = [":idmatricula" => $idmatricula, ":idmateria" => $idmateria, ":estado" => 'A'];
            $resp = Registromatricula::InsertMateria($params);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Materias::findAllMateriaPeriodoCarrera($params);
            
            $thead .= '<table id="tbMaterias" class="table table-hover table-collapse table-striped">
                        <thead class="text-center thead-dark">
                            <tr>
                                <th>Código</th>
                                <th>Materia</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>';
            
            foreach($resp as $row){
                $params = [":idmatricula" => $idmatricula, ":idmateria" => $row->idmateria];
                $materias = Registromatricula::CompruebaDetalleMatricula($params);

                if(count($materias)>0){
                    $rows .= '<tr>
                                <td class="text-center">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td class="text-center">
                                    <button id="'.Main::encryption($row->idmateria).'" class="btn btn-success btn-sm disabled" onclick="agregarMateria(this.id)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    <button value="'.Main::encryption($row->idmateria).'" class="btn btn-danger btn-sm" onclick="eliminaMateria(this.value)"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                </td>
                            </tr>';
                } else {
                    $rows .= '<tr>
                                <td class="text-center">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td class="text-center">
                                    <button id="'.Main::encryption($row->idmateria).'" class="btn btn-success btn-sm" onclick="agregarMateria(this.id)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                </td>
                            </tr>';
                }
            }

            $tfoot .= '</tbody>
                    </table>';
            
            $tabla = $thead . $rows . $tfoot;

            echo json_encode($tabla);
        }

        public function findidmatricula()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            
            $idestudiante = Main::decryption($idestudiante);
            $idperiodo = Main::decryption($idperiodo);
            
            $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo];
            $resp = Registromatricula::findIdMatricula($params);

            foreach($resp as $row){
                $idperiodo = Main::encryption($row->idperiodo);
                $idcarrera = Main::encryption($row->idcarrera);
                $idnivel = Main::encryption($row->idnivel);
                $modalidad = $row->modalidad;

                $resp = array(array("idperiodo" => $idperiodo, "idcarrera" => $idcarrera, "idnivel" => $idnivel, "modalidad" => $modalidad));
            }
 
            echo json_encode($resp);
        }

        public function findAllMateriaPeriodoCarrera()
        {
            $data = json_decode(file_get_contents("php://input"));

            $tabla = '';
            $thead = '';
            $rows = '';
            $tfoot = '';

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idestudiante = Main::decryption($idestudiante);
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo];
            $resp = Registromatricula::findIdMatricula($params);

            foreach($resp as $row){
                $idmatricula = $row->idmatricula;
            }

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Materias::findAllMateriaPeriodoCarrera($params);

            $thead .= '<table id="tbMaterias" class="table table-hover table-collapse table-striped">
                        <thead class="text-center thead-dark">
                            <tr>
                                <th>Código</th>
                                <th>Materia</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>';
            
            foreach($resp as $row){
                $params = [":idmatricula" => $idmatricula, ":idmateria" => $row->idmateria];
                $materias = Registromatricula::CompruebaDetalleMatricula($params);

                if(count($materias)>0){
                    $rows .= '<tr>
                                <td class="text-center">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td class="text-center">
                                    <button id="'.Main::encryption($row->idmateria).'" class="btn btn-success btn-sm disabled" onclick="agregarMateria(this.id)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    <button value="'.Main::encryption($row->idmateria).'" class="btn btn-danger btn-sm" onclick="eliminaMateria(this.value)"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                </td>
                            </tr>';
                } else {
                    $rows .= '<tr>
                                <td class="text-center">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td class="text-center">
                                    <button id="'.Main::encryption($row->idmateria).'" class="btn btn-success btn-sm" onclick="agregarMateria(this.id)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                </td>
                            </tr>';
                }
            }

            $tfoot .= '</tbody>
                    </table>';
            
            $tabla = $thead . $rows . $tfoot;

            echo json_encode($tabla);
        }

        public function eliminaMateria()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idestudiante = Main::decryption($idestudiante);
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idmateria = Main::decryption($idmateria);

            $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo];
            $resp = Registromatricula::findIdMatricula($params);

            foreach($resp as $row){
                $idmatricula = $row->idmatricula;
            }

            $params = [":idmatricula" => $idmatricula, ":idmateria" => $idmateria];
            $resp = Registromatricula::DeleteMateria($params);

            $tabla = '';
            $thead = '';
            $rows = '';
            $tfoot = '';

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Materias::findAllMateriaPeriodoCarrera($params);
            
            $thead .= '<table id="tbMaterias" class="table table-hover table-collapse table-striped">
                        <thead class="text-center thead-dark">
                            <tr>
                                <th>Código</th>
                                <th>Materia</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>';
            
            foreach($resp as $row){
                $params = [":idmatricula" => $idmatricula, ":idmateria" => $row->idmateria];
                $materias = Registromatricula::CompruebaDetalleMatricula($params);

                if(count($materias)>0){
                    $rows .= '<tr>
                                <td class="text-center">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td class="text-center">
                                    <button id="'.Main::encryption($row->idmateria).'" class="btn btn-success btn-sm disabled" onclick="agregarMateria(this.id)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    <button value="'.Main::encryption($row->idmateria).'" class="btn btn-danger btn-sm" onclick="eliminaMateria(this.value)"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                </td>
                            </tr>';
                } else {
                    $rows .= '<tr>
                                <td class="text-center">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td class="text-center">
                                    <button id="'.Main::encryption($row->idmateria).'" class="btn btn-success btn-sm" onclick="agregarMateria(this.id)"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                </td>
                            </tr>';
                }
            }

            $tfoot .= '</tbody>
                    </table>';
            
            $tabla = $thead . $rows . $tfoot;

            echo json_encode($tabla);
        }
    }

?>