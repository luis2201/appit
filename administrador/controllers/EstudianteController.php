<?php

    class EstudianteController
    {

        public function findestudiantelista()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $modalidad = Main::limpiar_cadena($data->modalidad);
            $idnivel = Main::limpiar_cadena($data->idnivel);
            
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":modalidad" => $modalidad, ":idnivel" => $idnivel];
            $res = Matricula::findEstudianteLista($param);

            $thead = '<table id="tbLista" class="table table-condensed table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Nº Matrícula</th>
                                <th class="text-center">Nº Identificación</th>
                                <th class="text-center">Nómina de Estudiantes</th>
                                <th class="text-center">Estado Datos</th>
                                <th class="text-center">Estado Matrícula</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>';
            
            $tbody = '';
            foreach ($res as $row) {
                $estadodatos = ($row->estadodatos == 'A')?'<span class="badge bg-success">Actualizado</span>':'<span class="badge bg-secondary">Registrado</span>';
                $estadomatricula = ($row->estadomatricula)?'<span class="badge bg-success">Matriculado</span>':'<span class="badge bg-warning">Pendiente</span>';
                $tbody .='<tr>
                            <td class="text-center">'.$row->numero_matricula.'</td>
                            <td class="text-center">'.$row->numero_identificacion.'</td>
                            <td>'.$row->estudiantes.'</td>
                            <td class="text-center">'.$estadodatos.'</td>
                            <td class="text-center">'.$estadomatricula.'</td>
                            <td class="text-center">
                                <button id="'.Main::encryption($row->idmatricula).'" class="btn btn-primary btn-sm" onclick="verDatos(this.id)"><i class="fas fa-eye"></i> Modificar Materias</button>
                            </td>
                        </tr>';    
            }
            
            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

        public function findestudiantesidmateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $param = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
            $resp = Estudiante::findEstudiantesIdMateria($param);

            $thead = '<table class="table table-condensed table-hover" style="margin:auto;width:60%;">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th class="text-center">Nº Matrícula</th>
                                <th class="text-center">Nº Identificación</th>
                                <th class="text-center">Nómina de Estudiantes</th>
                                <th class="text-center"><button class="btn btn-success btn-sm" onclick="listarEstudiante()"><i class="fas fa-user-plus"></i> Agregar</button></th>
                            </tr>
                        </thead>
                        <tbody>';

            $tbody = '';

            foreach($resp as $row){
                $tbody .= '<tr>
                                <td class="text-center">'.$row->numero_matricula.'</td>
                                <td class="text-center">'.$row->numero_identificacion.'</td>
                                <td>'.$row->estudiante.'</td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-sm" onclick="eliminarEstudiante('.$row->iddetalle_matricula.')"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>';
            }
            
            $tfoot = '</tbody>
                    </table>';
                
            echo json_encode($thead . $tbody . $tfoot);
        }

        public function findestudianteslista()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);
            
            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel];
            $res = Matricula::findEstudiantesLista($param);

            $thead = '<table id="tbLista" class="table table-condensed table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Nº Matrícula</th>
                                <th class="text-center">Nº Identificación</th>
                                <th class="text-center">Nómina de Estudiantes</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>';
            
            $tbody = '';
            foreach ($res as $row) {
                $tbody .='<tr>
                            <td class="text-center">'.$row->numero_matricula.'</td>
                            <td class="text-center">'.$row->numero_identificacion.'</td>
                            <td>'.$row->estudiantes.'</td>
                            <td class="text-center">
                                <button id="'.Main::encryption($row->idmatricula).'" class="btn btn-primary btn-sm" onclick="agregarEstudiante(this.id)"><i class="fas fa-user-plus"></i></button>
                            </td>
                        </tr>';    
            }
            
            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }
    }