<?php

    class CarreraController
    {
        public function findallvalidacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $param = [":idperiodo" => $idperiodo];
            $resp = Carrera::findAllValidacion($param);

            $options = '<option value="">-- Seleccione Carrera --</option>';

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->idcarrera).'">'.$row->carrera.'</option>';
            }

            echo json_encode($options);
        }

        public function findcarreradocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $iddocente = Main::decryption($iddocente);

            $resp = Carrera::findCarreraDocente($idperiodo, $iddocente);

            echo json_encode($resp);
        } 
        
        public function findcarrerasdocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $iddocente = Main::decryption($iddocente);

            $resp = Carrera::findCarreraDocente($idperiodo, $iddocente);

            $options = '<option value="">-- Seleccione Carrera --</option>';

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->idcarrera).'">'.$row->carrera.'</option>';
            }

            echo json_encode($options);
        }

        public function findcarreradocentepresencial()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            
            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $resp = Carrera::findCarreraDocentePresencial($idperiodo, $iddocente);

            echo json_encode($resp);
        } 

        public function findcarreraintroductorio()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            
            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente];
            $resp = Carrera::findCarreraIntroductorio($params);

            $options = '<option value="">-- Seleccione Carrera --</option>';
            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->idcarrera).'">'.$row->carrera.'</option>';
            }

            echo json_encode($options);
        } 
    }
