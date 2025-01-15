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

        public function findseccionidperiodotutor()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idcarrera = Main::decryption($idcarrera);
            
            $res = Seccion::findSeccionIdPeriodoTutor($idperiodo, $iddocente, $idcarrera, $idnivel);

            echo json_encode($res);
        }
    }

?>