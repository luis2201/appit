<?php

    class MateriaintroductorioController
    {
        public function findMateriaIdDocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idcarrera = Main::decryption($idcarrera);
            
            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idcarrera" => $idcarrera]; 
            $res = Materiaintroductorio::findMateriaIdDocente($params);
            
            $options = '<option value="">-- Seleccione Materia --</option>';

            foreach ($res as $row) {
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->materia.'</option>';
            }

            echo json_encode($options);
        }
    }

?>