<?php

    class TutorController
    {
        public function index()
        {
            $docentes = Docente::findAll();
            $carreras = Carrera::findAll();

            view("tutor.index", ["docentes" => $docentes, "carreras" => $carreras]);
        }

        public function findall($idperiodo)
        {
            $idperiodo = Main::limpiar_cadena($idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $res = Tutor::findAll($idperiodo);

            $thead = '<thead>
                        <tr>
                            <th scope="col" class="text-center">Cédula</th>
                            <th scope="col" class="text-center">Docente</th>
                            <th scope="col" class="text-center">Carrera</th>
                            <th scope="col" class="text-center">Semestre</th>
                            <th scope="col" class="text-center">Seccion</th>
                            <th scope="col" class="text-center">Modalidad</th>
                            <th scope="col" class="text-center"></th>
                        </tr>
                      </thead>
                      <tbody>';
          
            foreach($res as $row){
                $tbody.= '<tr>
                            <td>'.$row->numerodocumento.'</td>
                            <td>'.$row->docente.'</td>
                            <td>'.$row->carrera.'</td>
                            <td>'.$row->nivel.'</td>
                            <td>'.$row->seccion.'</td>
                            <td>'.$row->modalidad.'</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Buttons control">
                                    <button id="'.Main::encryption($row->iddocente).'" type="button" class="form btn btn-sm btn-warning" onclick="editTutor(this.id);"><i class="far fa-edit text-light"></i></button>
                                    <button id="'.Main::encryption($row->iddocente).'" type="button" class="form btn btn-sm btn-danger" onclick="deleteTutor(this.id);"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                            </td>
                          </tr>';
            }

            $tbody.= '</tbody>';
            
            $tabla = $thead.$tbody;
            
            echo json_encode($tabla);
        }

        public function inserttutor()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel   = Main::limpiar_cadena($data->idnivel);
            $idseccion = Main::limpiar_cadena($data->idseccion);
            $modalidad = Main::limpiar_cadena($data->modalidad);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $tutores = new Tutor();
            $tutores->idperiodo = $idperiodo;
            $tutores->iddocente = $iddocente;
            $tutores->idcarrera = $idcarrera;
            $tutores->idnivel   = $idnivel;
            $tutores->idseccion = $idseccion;
            $tutores->modalidad = $modalidad;

            $tutores->insertTutor();

            echo json_encode($tutores);
        }
    }

?>