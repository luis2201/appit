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

        public function findprofesorcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
            $resp = Docente::findProfesorMateriaCarrera($params);

            $options = '<option value="">-- Seleccione Docente --</option>';

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->iddocente).'">'.$row->docente.'</option>';
            }
        
            echo json_encode($options);
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
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $res = Docente::findDocenteCarreraMaterias($idperiodo, $idcarrera, $iddocente);

            echo json_encode($res);
        }

        public function finddocentemateria()
        {
            $data = json_decode(file_get_contents('php://input'));
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);

            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente];
            $res = Docente::findDocenteMateria($params);

            $options = '<option value="">-- Seleccione Materia --</option>';
            foreach($res as $row){                
                $options .= '<option value="'.Main::encryption($row->idmateria).'">( '.$row->codigo.' ) ' .$row->materia.'</option>';
            }

            echo json_encode($options);
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