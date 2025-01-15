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
    }

?>