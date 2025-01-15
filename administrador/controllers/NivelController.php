<?php

    class NivelController
    {

        public function findnivelmodalidadidcarreraidperiodo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $modalidad = Main::limpiar_cadena($data->modalidad);
            
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":modalidad" => $modalidad];
            $res = Nivel::findNivelModalidadidCarreraIdPeriodo($param);

            $options = '<option value="">-- Seleccione Nivel --</option>';
            foreach ($res as $row) {
                $options .= '<option value="'. Main::encryption($row->idnivel) .'">'. $row->nivel .'</option>';
            }

            echo json_encode($options);
        }

        public function findnivelidcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $res = Nivel::findNivelIdCarrera($param);

            $options = '<option value="">-- Seleccione Nivel --</option>';
            foreach ($res as $row) {
                $options .= '<option value="'. Main::encryption($row->idnivel) .'">'. $row->nivel .'</option>';
            }

            echo json_encode($options);
        }

    }