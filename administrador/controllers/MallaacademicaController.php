<?php

    class MallaacademicaController
    {

        public function index()
        {
            $periodos = Periodo::findActivo();
            foreach($periodos as $row){
                $idperiodo = $row->idperiodo;
            }

            $param = [":idperiodo" => $idperiodo];
            $carreras = Carrera::findCarreraIdPeriodo($param);

            view("mallaacademica.index", ["periodos" => $periodos, "carreras" => $carreras]);
        }

        public function findmallaidperiodo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel];
            $resp = Mallaacademica::findMallaIdPeriodo($param);
            if(count($resp) > 0){
                $thead = '<table id="tbLista" class="table table-border table-hover" style="width:100%; margin:auto;">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th class="text-center">IdMateria</th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Materia</th>
                                    <th><button class="btn btn-success btn-sm" onclick="muestraMateria();">Agregar Materia</button></th>
                                </tr>
                            </thead>
                            <tbody>';
            } else{
                $thead = '<table id="tbLista" class="table table-border table-hover" style="width:100%; margin:auto;">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th class="text-center">IdMateria</th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Materia</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
            }

            $tbody = '';

            foreach($resp as $row){
                $tbody .= '<tr>
                                <td class="text-center" style="width:10%">'.$row->idmateria.'</td>
                                <td class="text-center" style="width:10%">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td style="width:10%">
                                    <buttom id="'.Main::encryption($row->idmateria).'" class="btn btn-sm btn-danger" onclick="eliminaMateria(this.id)"><i class="fa fa-trash" aria-hidden="true"></i></buttom>
                                </td>
                           </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

        public function findmateriaidcarrera()
        {
            $resp = Materia::findAll();

            $thead = '<table id="tbMaterias" class="table table-condensed table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Materia</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>';
            
            $tbody = '';
            
            foreach ($resp as $row){
                $tbody .= '<tr>
                            <td class="text-center" style="width: 20%;">'.$row->codigo.'</td>
                            <td>'.$row->materia.'</td>
                            <td class="text-center" style="width: 5%;">
                                <button id="'.Main::encryption($row->idmateria).'" class="btn btn-success btn-sm" onclick="agregaMalla(this.id)"><i class="fas fa-check-circle"></i></button>
                            </td>
                          </tr>';
            }
            
            $tfoot = '</tbody>
                     </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

        public function agregamateriamalla()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);
            $idmateria = Main::decryption($idmateria);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel, ":idmateria" => $idmateria];
            $resp = Mallaacademica::agregaMateriaMalla($param);
            
            echo json_encode($resp);
        }

        public function eliminamateriamalla()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idmateria = Main::decryption($idmateria);
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel, ":idmateria" => $idmateria];
            $resp = Mallaacademica::eliminaMateriaMalla($param);
            
            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel];
            $resp = Mallaacademica::findMallaIdPeriodo($param);
            if(count($resp) > 0){
                $thead = '<table id="tbLista" class="table table-border table-hover" style="width:100%; margin:auto;">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th class="text-center">IdMateria</th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Materia</th>
                                    <th><button class="btn btn-success btn-sm" onclick="muestraMateria();">Agregar Materia</button></th>
                                </tr>
                            </thead>
                            <tbody>';
            } else{
                $thead = '<table id="tbLista" class="table table-border table-hover" style="width:100%; margin:auto;">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th class="text-center">IdMateria</th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Materia</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
            }

            $tbody = '';

            foreach($resp as $row){
                $tbody .= '<tr>
                                <td class="text-center" style="width:10%">'.$row->idmateria.'</td>
                                <td class="text-center" style="width:10%">'.$row->codigo.'</td>
                                <td>'.$row->materia.'</td>
                                <td style="width:10%">
                                    <buttom id="'.Main::encryption($row->idmateria).'" class="btn btn-sm btn-danger" onclick="eliminaMateria(this.id)"><i class="fa fa-trash" aria-hidden="true"></i></buttom>
                                </td>
                           </tr>';
            }

            $tfoot = '</tbody>
                    </table>';

            echo json_encode($thead . $tbody . $tfoot);
        }

    }