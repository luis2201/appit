<?php

    class ModalidadController
    {
        public function findmodalidadseccioncarrera()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idseccion = Main::limpiar_cadena($data->idseccion);
            
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idseccion" => $idseccion];
            $resp = Modalidad::findModalidadSeccionCarrera($params);

            echo json_encode($resp);
        }

        public function findmodalidadseccioncarreras()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idseccion = Main::limpiar_cadena($data->idseccion);
            
            $idperiodo = Main::decryption($idperiodo);            

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idseccion" => $idseccion];
            $resp = Modalidad::findModalidadSeccionCarrera($params);

            echo json_encode($resp);
        }

        public function findmodalidadcarrera()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);            
            
            $idperiodo = Main::decryption($idperiodo);            

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Modalidad::findModalidadCarrera($params);

            echo json_encode($resp);
        }
    }

?>