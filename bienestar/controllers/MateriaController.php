<?php

    class MateriaController
    {
        public function findMateriaIdDocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);
            
            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]; 
            $res = Materia::findMateriaIdDocente($params);
            
            $options = '<option value="">-- Seleccione Materia --</option>';

            foreach ($res as $row) {
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->materia.'</option>';
            }

            echo json_encode($options);
        }

        public function findmateriaperiodocarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);            

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);            
            
            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera]; 
            $resp = Materia::findMateriaPeriodoCarrera($params);
            
            $options = '<option value="">-- Seleccione Materia --</option>';

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->materia.'</option>';
            }

            echo json_encode($options);
        }
    }