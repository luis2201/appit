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
            
            $resp = Modalidad::findModalidadIdPeriodoTutor($idperiodo, $iddocente, $idcarrera, $idnivel, $idseccion);

            echo json_encode($resp);
        }

        public function findmodalidadcarreraseccion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);            
            $idcarrera = Main::limpiar_cadena($data->idcarrera);            
            $idseccion = Main::limpiar_cadena($data->idseccion);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idseccion = Main::decryption($idseccion);
            
            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idseccion" => $idseccion];
            $resp = Modalidad::findModalidadCarreraSeccion($params);

            $options = '<option value="">-- Seleccione Modalidad --</option>';            

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->modalidad).'">'.$row->modalidad.'</option>';
            }

            echo json_encode($options);
        }
    }

?>