<?php

    class ModalidadController
    {
        public function findmodalidadidperiodotutor()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);
            $idseccion = Main::limpiar_cadena($data->idseccion);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idcarrera = Main::decryption($idcarrera);
            
            $res = Modalidad::findModalidadIdPeriodoTutor($idperiodo, $iddocente, $idcarrera, $idnivel, $idseccion);

            echo json_encode($res);
        }
    }

?>