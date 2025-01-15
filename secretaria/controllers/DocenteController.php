<?php

    class DocenteController
    {
        public function finddocentecarreracurso()
        {
            $data = json_decode(file_get_contents('php://input'));
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $res = Docente::findDocenteCarreraCurso($idperiodo, $idcarrera, $iddocente);

            echo json_encode($res);
        }

        public function finddocentecarreracursos()
        {
            $data = json_decode(file_get_contents('php://input'));
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);

            $res = Docente::findDocenteCarreraCurso($idperiodo, $idcarrera, $iddocente);

            echo json_encode($res);
        }

        public function finddocentecarreramateria()
        {
            $data = json_decode(file_get_contents('php://input'));
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel   = Main::limpiar_cadena($data->idnivel);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $res = Docente::findDocenteCarreraMateria($idperiodo, $idcarrera, $idnivel, $iddocente);

            echo json_encode($res);
        }

        public function finddocentecarreramaterias()
        {
            $data = json_decode(file_get_contents('php://input'));
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel   = Main::limpiar_cadena($data->idnivel);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);

            $res = Docente::findDocenteCarreraMateria($idperiodo, $idcarrera, $idnivel, $iddocente);

            echo json_encode($res);
        }

        public function finddocentemateriapresencial()
        {
            $data = json_decode(file_get_contents('php://input'));
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente];
            $res = Docente::findDocenteMateriaPresencial($params);

            $options = '<option value="">-- Seleccione Materia --</option>';
            foreach($res as $row){                
                $options .= '<option value="'.Main::encryption($row->idmateria).'">( '.$row->codigo.' ) ' .$row->materia.'</option>';
            }

            echo json_encode($options);
        }
    
    }

?>    