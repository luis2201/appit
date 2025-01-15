<?php

    class CarreraController
    {

        public function findcarreraidperiodo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);

            $idperiodo = Main::decryption($idperiodo);

            $param = [":idperiodo" => $idperiodo];
            $resp = Carrera::findCarreraIdPeriodo($param);

            $options = '<option value="">-- Seleccione Carrera --</option>';
            foreach($resp as $row){
                $options .= '<option value="'.Main::encryption($row->idcarrera).'">'. $row->carrera .'</option>';
            }

            echo json_encode($options);
        }

    }