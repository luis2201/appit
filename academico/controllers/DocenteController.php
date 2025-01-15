<?php

    class DocenteController
    {
        public function finddocenteidcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));
            
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idmateria_introductorio = Main::limpiar_cadena($data->idmateria_introductorio);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idmateria_introductorio = Main::decryption($idmateria_introductorio);

            // $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera]; 
            // $res = Docente::findDocenteIdCarrera($param);
            $res = Docente::findAll();

            $options = "";

            foreach($res as $row){
                $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idmateria_introductorio" => $idmateria_introductorio, ":iddocente" => $row->iddocente]; 
                $estado = Cargahorariaintroductorio::findDocenteIdMateriaintroductorio($param);
                
                if(count($estado) == 0){
                    $options .= '<div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="'.Main::encryption($row->iddocente).'" onclick="saveDocente(this);">
                                    <label class="form-check-label" for="flexRadioDefault1">'.$row->apellido1.' '.$row->apellido2.' '. $row->nombre1.' '.$row->nombre2.'</label>
                                </div>';
                } else{
                    $options .= '<div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="'.Main::encryption($row->iddocente).'" onclick="saveDocente(this);" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">'.$row->apellido1.' '.$row->apellido2.' '. $row->nombre1.' '.$row->nombre2.'</label>
                                </div>';
                }
            }

            echo json_encode($options);
        }

        public function finddocentecarreracurso()
        {
            $data = json_decode(file_get_contents('php://input'));
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $res = Docente::findDocenteCarreraCurso($idperiodo, $idcarrera, $iddocente);

            echo json_encode($res);
        }
        
        public function findprofesormateriacarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Docente::findProfesorMateriaCarrera($params);
        
            echo json_encode($resp);
        }

        public function findprofesorcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Docente::findProfesorMateriaCarrera($params);

            $options = '<option value="">-- Seleccione Docente --</option>';

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->iddocente).'">'.$row->docente.'</option>';
            }
        
            echo json_encode($options);
        }
    }

?>