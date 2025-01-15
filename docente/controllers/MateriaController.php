<?php

    class MateriaController
    {
        public function findMateriaIdDocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            // $idcarrera = Main::limpiar_cadena($data->idcarrera);
            // $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            // $idcarrera = Main::decryption($idcarrera);
            // $idnivel = Main::decryption($idnivel);
            
            // $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]; 
            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente]; 
            $res = Materia::findMateriaIdDocente($params);
            
            $options = '<option value="">-- Seleccione Materia --</option>';

            foreach ($res as $row) {
                $options .= '<option value="'.Main::encryption($row->idmateria).'">('.$row->codigo.') ' .$row->materia.'</option>';
            }

            echo json_encode($options);
        }

        public function findMateriasIdDocente()
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
            $res = Materia::findMateriasIdDocente($params);
            
            $options = '<option value="">-- Seleccione Materia --</option>';

            foreach ($res as $row) {
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->codigo.' '.$row->materia.'</option>';
            }

            echo json_encode($options);
        }

        public function findMateriasValidacion()
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
            
            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]; 
            $res = Materia::findMateriasValidacion($params);
            
            $options = '<option value="">-- Seleccione Materia --</option>';

            foreach ($res as $row) {
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->materia.'</option>';
            }

            echo json_encode($options);
        }

        public function finddocentematerias()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $iddocente = Main::decryption($iddocente);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":iddocente" => $iddocente];
            $res = Materia::findDocenteMaterias($params);

            $options = '<option value="">-- Seleccione Materia --</option>';
            foreach($res as $row){
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->codigo.' - '.$row->materia.'</option>';
            }

            echo json_encode($options);
        }
    }

?>