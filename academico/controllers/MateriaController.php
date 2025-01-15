<?php 

    class MateriaController
    {

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
            $res = Materias::findDocenteMaterias($params);

            $options = '<option value="">-- Seleccione Materia --</option>';
            foreach($res as $row){
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->codigo.' - '.$row->materia.'</option>';
            }

            echo json_encode($options);
        }

    }