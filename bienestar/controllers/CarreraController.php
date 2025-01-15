<?php

    class CarreraController
    {
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
    }
