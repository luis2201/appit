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

        public function findniveliddocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idcarrera = Main::decryption($idcarrera);
            
            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idcarrera" => $idcarrera]; 
            $res = Nivel::findNivelIdDocente($params);
            
            $options = '<option value="">-- Seleccione Curso --</option>';

            foreach ($res as $row) {
                $options .= '<option value="'.Main::encryption($row->idnivel).'">'.$row->nivel.'</option>';
            }

            echo json_encode($options);
        }

        public function findnivelcarreraseccionmodalidad()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idseccion = Main::limpiar_cadena($data->idseccion);
            $modalidad = Main::limpiar_cadena($data->modalidad);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idseccion = Main::decryption($idseccion);
            $modalidad = Main::decryption($modalidad);
            
            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idseccion" => $idseccion, ":modalidad" => $modalidad]; 
            $resp = Nivel::findNivelCarreraSeccionModalidad($params);
            
            $options = '<option value="">-- Seleccione Curso --</option>';

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->idnivel).'">'.$row->nivel.'</option>';
            }

            echo json_encode($options);
        }
    }

?>