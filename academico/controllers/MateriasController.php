 <?php

    class MateriasController
    {
        public function finddocentematerias()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $iddocente = Main::decryption($iddocente);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":iddocente" => $iddocente];
            $res = Materias::findDocenteMaterias($params);

            $options = '<option value="">-- Seleccione Materia --</option>';
            foreach($res as $row){
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->codigo.' - '.$row->materia.'</option>';
            }

            echo json_encode($options);
        }

        public function findmateriaidcarrera()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idmateria_introductorio = Main::limpiar_cadena($data->idmateria_introductorio);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idmateria_introductorio = Main::decryption($idmateria_introductorio);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $res = Materias::findMateriaIdCarrera($params);

            $checks = '';
            foreach($res as $row){
                $params = [":idmateria_introductorio" => $idmateria_introductorio, ":idmateria" => $row->idmateria];
                $valida = Materiasperfil::validaMateria($params);

                if(count($valida)==0){
                    $comprueba = Materiasperfil::compruebaMateria($params);     
                    if(count($comprueba) == 0){
                        $checks .= '<div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="'.Main::encryption($row->idmateria).'" onClick="addPerfil(this);">
                                        <label class="form-check-label" for="'.$row->idmateria.'">'.$row->materia.'</label>
                                    </div>';
                    } else{
                        $checks .= '<div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="'.Main::encryption($row->idmateria).'" onClick="addPerfil(this);" checked>
                                        <label class="form-check-label" for="'.$row->idmateria.'">'.$row->materia.'</label>
                                    </div>';
                    }
                } 
            }

            echo json_encode($checks);
        }
    }

?>