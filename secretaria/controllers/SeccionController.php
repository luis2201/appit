<?php

    class SeccionController
    {
        public function findseccionidperiodo($idperiodo)
        {
            $idperiodo = Main::limpiar_cadena($idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $res = Seccion::findSeccionIdPeriodo($idperiodo);

            echo json_encode($res);
        }

        public function findseccionidperiodocambio($idperiodo)
        {
            $idperiodo = Main::limpiar_cadena($idperiodo);

            $res = Seccion::findSeccionIdPeriodo($idperiodo);

            echo json_encode($idperiodo);
        }

        public function findseccionidcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));            

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Seccion::findSeccionIdCarrera($params);

            echo json_encode($resp);
        }

        public function findseccionidcarreras()
        {
            $data = json_decode(file_get_contents('php://input'));            

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            
            $idperiodo = Main::decryption($idperiodo);            

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Seccion::findSeccionIdCarrera($params);

            echo json_encode($resp);
        }

        public function findseccionidcarreraspresencial()
        {
            $data = json_decode(file_get_contents('php://input'));            

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            
            $idperiodo = Main::decryption($idperiodo);            

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Seccion::findSeccionIdCarreraPresencial($params);

            echo json_encode($resp);
        }
    }

?>