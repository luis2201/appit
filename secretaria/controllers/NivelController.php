<?php

    class NivelController
    {
        public function findcursoidcarrerapresencial()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Nivel::findCursoIdCarreraPresencial($params);

            echo json_encode($resp);
        }

        public function findcursoidcarreravirtual()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Nivel::findCursoIdCarreraVirtual($params);

            echo json_encode($resp);
        }

        public function findnivelseccioncarreramodalidad()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idseccion = Main::limpiar_cadena($data->idseccion);
            $modalidad = Main::limpiar_cadena($data->modalidad);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $params = [":idperiodo" => $idperiodo, ":idseccion" => $idseccion, ":idcarrera" => $idcarrera, ":modalidad" => $modalidad];
            $resp = Nivel::findNivelSeccionCarreraModalidad($params);

            echo json_encode($resp);
        }

        public function findnivelseccioncarreramodalidades()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idseccion = Main::limpiar_cadena($data->idseccion);
            $modalidad = Main::limpiar_cadena($data->modalidad);

            $idperiodo = Main::decryption($idperiodo);            

            $params = [":idperiodo" => $idperiodo, ":idseccion" => $idseccion, ":idcarrera" => $idcarrera, ":modalidad" => $modalidad];
            $resp = Nivel::findNivelSeccionCarreraModalidad($params);

            echo json_encode($resp);
        }

        public function findnivelcarreramodalidad()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);            
            $modalidad = Main::limpiar_cadena($data->modalidad);

            $idperiodo = Main::decryption($idperiodo);            

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":modalidad" => $modalidad];
            $resp = Nivel::findNivelCarreraModalidad($params);

            echo json_encode($resp);
        }

        public function findnivelcarreraenlinea()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);                        

            $idperiodo = Main::decryption($idperiodo);            

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Nivel::findNivelCarreraEnLinea($params);

            echo json_encode($resp);
        }

        public function findnivelcarreravalidacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);                        

            $idperiodo = Main::decryption($idperiodo);            

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Nivel::findNivelCarreraValidacion($params);

            echo json_encode($resp);
        }
    }

?>