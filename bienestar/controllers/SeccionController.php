<?php

    class SeccionController
    {
        public function findseccionidperiodo()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Seccion::findSeccionIdPeriodo($params);

            $options = '<option value="">-- Seleccione Sección --</option>';

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->idseccion).'">'.$row->seccion.'</option>';
            }

            echo json_encode($options);
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