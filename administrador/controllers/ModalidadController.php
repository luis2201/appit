<?php

    class ModalidadController
    {

        public function findmodalidadidcarreraidperiodo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $res = Modalidad::findModalidadidCarreraIdPeriodo($param);

            $options = '<option value="">-- Seleccione Modalidad --</option>';
            foreach ($res as $row) {
                $options .= '<option value="'. $row->modalidad .'">'. $row->modalidad .'</option>';
            }

            echo json_encode($options);
        }

    }