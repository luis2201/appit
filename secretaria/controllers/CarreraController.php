<?php

    class CarreraController
    {
        
        public function findAll()
        {
            $resp = Carrera::findAll();

            echo json_encode($resp);
        }

        public function findCarreraPeriodo($idperiodo)
        {            
            $idperiodo = Main::limpiar_cadena($idperiodo);
            $idperiodo = Main::decryption($idperiodo);                        

            $params = [":idperiodo" => $idperiodo];
            $resp = Carrera::findCarreraPeriodo($params);

            echo json_encode($resp);
        }

        public function findCarreraPeriodoPresencial($idperiodo)
        {            
            $idperiodo = Main::limpiar_cadena($idperiodo);
            $idperiodo = Main::decryption($idperiodo);                        

            $params = [":idperiodo" => $idperiodo];
            $resp = Carrera::findCarreraPeriodoPresencial($params);
            
            echo json_encode($resp);
        }

        public function findCarreraPeriodoValidacion($idperiodo)
        {            
            $idperiodo = Main::limpiar_cadena($idperiodo);
            $idperiodo = Main::decryption($idperiodo);                        

            $params = [":idperiodo" => $idperiodo];
            $resp = Carrera::findCarreraPeriodoValidacion($params);

            echo json_encode($resp);
        }

        public function findCarreraPeriodoVirtual($idperiodo)
        {            
            $idperiodo = Main::limpiar_cadena($idperiodo);
            $idperiodo = Main::decryption($idperiodo);                        

            $params = [":idperiodo" => $idperiodo];
            $resp = Carrera::findCarreraPeriodoVirtual($params);

            echo json_encode($resp);
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

        public function findcarreradocentes()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            
            $resp = Carrera::findCarreraDocente($idperiodo, $iddocente);

            echo json_encode($resp);
        }

    }

?>