<?php

    class EstudianteController
    {
        
        public function findestudianteidcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $res = Estudiante::findEstudianteIdCarrera($param);

            $thead = '<table class="table table-bordered table-striped text-center" id="tbLista" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                        <tr class="text-center">
                            <td>#</td>
                            <td>Matrícula</td>
                            <td>Cédula/Pasaporte</td>
                            <td>Apellidos</td>
                            <td>Nombres</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>';

            $rows = '';

            $i = 1;
            foreach($res as $row){
                
                $rows .= '<tr>
                            <td>'.$i++.'</td>
                            <td>'.$row->idmatricula.'</td>
                            <td>'.$row->numero_identificacion.'</td>
                            <td>'.$row->apellidos.'</td>
                            <td>'.$row->nombres.'</td>
                            <td><a id="'.Main::encryption($row->idmatricula).'" href="javascript:;" class="" onclick="agregaMaterias(this)"><i class="fas fa-plus-circle"></i></a></td>
                         </tr>';
            }

            $tfooter = '</tbody>
                    </table>';

            echo json_encode($thead.$rows.$tfooter);
        }

        public function findestudianteidcarreracalificacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $res = Estudiante::findEstudianteIdCarrera($param);

            $thead = '<table class="table table-bordered table-striped text-center" id="tbLista" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                        <tr class="text-center">
                            <td>#</td>
                            <td>Matrícula</td>
                            <td>Cédula/Pasaporte</td>
                            <td>Apellidos</td>
                            <td>Nombres</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>';

            $rows = '';

            $i = 1;
            foreach($res as $row){
                
                $rows .= '<tr>
                            <td>'.$i++.'</td>
                            <td>'.$row->idmatricula.'</td>
                            <td>'.$row->numero_identificacion.'</td>
                            <td>'.$row->apellidos.'</td>
                            <td>'.$row->nombres.'</td>
                            <td><a id="'.Main::encryption($row->idmatricula).'" href="javascript:;" class="" onclick="verCalificaciones(this)"><i class="fas fa-eye"></i></a></td>
                         </tr>';
            }

            $tfooter = '</tbody>
                    </table>';

            echo json_encode($thead.$rows.$tfooter); 
        }

        public function findestudianteidcarreracalificacionrecord()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $res = Estudiante::findEstudianteIdCarrera($param);

            $thead = '<table class="table table-bordered table-striped text-center" id="tbLista" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                        <tr class="text-center">
                            <td>#</td>
                            <td>Matrícula</td>
                            <td>Cédula/Pasaporte</td>
                            <td>Apellidos</td>
                            <td>Nombres</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>';

            $rows = '';

            $i = 1;
            foreach($res as $row){
                
                $rows .= '<tr>
                            <td>'.$i++.'</td>
                            <td>'.$row->idmatricula.'</td>
                            <td>'.$row->numero_identificacion.'</td>
                            <td>'.$row->apellidos.'</td>
                            <td>'.$row->nombres.'</td>
                            <td><a href="recordpdf/'.ucfirst(Main::encryption($row->idmatricula)).'" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                         </tr>';
            }

            $tfooter = '</tbody>
                    </table>';

            echo json_encode($thead.$rows.$tfooter); 
        }
    }

?>