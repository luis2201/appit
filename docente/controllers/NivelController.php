<?php

    class NivelController
    {
        public function findnivelidperiodotutor()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            
            $res = Nivel::findNivelIdPeriodoTutor($idperiodo, $iddocente);

            echo json_encode($res);
        }

        public function findnivelidperiodotutorenlinea()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $iddocente = Main::decryption($iddocente);
            
            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":iddocente" => $iddocente];
            $res = Nivel::findNivelIdPeriodoTutorEnLinea($params);

            echo json_encode($res);
        }

        public function findniveliddocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idcarrera = Main::decryption($idcarrera);
            
            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idcarrera" => $idcarrera]; 
            $res = Nivel::findNivelIdDocente($params);
            
            $options = '<option value="">-- Seleccione Curso --</option>';

            foreach ($res as $row) {
                $options .= '<option value="'.Main::encryption($row->idnivel).'">'.$row->nivel.'</option>';
            }

            echo json_encode($options);
        }

        public function findnivelvalidacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            
            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera]; 
            $res = Nivel::findNivelValidacion($params);
            
            $options = '<option value="">-- Seleccione Curso --</option>';

            foreach ($res as $row) {
                $options .= '<option value="'.Main::encryption($row->idnivel).'">'.$row->nivel.'</option>';
            }

            echo json_encode($options);
        }
    }

?>