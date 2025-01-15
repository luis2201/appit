<?php

    class MateriasintroductorioController
    {

        public function index()
        {
            $materias = Materiasintroductorio::findAll();
            $carreras = Carrera::findAll();

            view('materiasintroductorio.index', ["materias" => $materias, "carreras" => $carreras]);
        }

        public function savemateria()
        {
            $data = json_decode(file_get_contents('php://input'));
            
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $materia = Main::limpiar_cadena($data->materia);

            if($idmateria != "0") $idmateria = Main::decryption($idmateria);
            $idcarrera = Main::decryption($idcarrera);

            $param = [":idmateria" => $idmateria, ":idcarrera" => $idcarrera, ":materia" => $materia];
            $resp = Materiasintroductorio::saveMateria($param);

            echo json_encode($resp);
        }

        public function findidmateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idmateria = Main::decryption($idmateria);

            $param = [":idmateria" => $idmateria];
            $resp = Materiasintroductorio::findIdMateria($param);

            $datos = array();
            foreach ($resp as $row) {
                array_push($datos, ["idmateria" => $row->idmateria, "idcarrera" => Main::encryption($row->idcarrera), "materia" => $row->materia]);
            }

            echo json_encode($datos);
        }

        public function deletemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idmateria = Main::decryption($idmateria);

            $param = [":idmateria" => $idmateria];
            $resp = Materiasintroductorio::deleteMateria($param);

            echo json_encode($resp);
        }

        public function findmateriaidcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idcarrera = Main::decryption($idcarrera);

            $param = [":idcarrera" => $idcarrera];
            $resp = Materiasintroductorio::findMateriaIdCarrera($param);

            $options = '<option value="">-- Seleccione Materia Introductorio --</option>';

            foreach ($resp as $row) {
                $options .= '<option value="'.Main::encryption($row->idmateria).'">'.$row->materia.'</option>';
            }

            echo json_encode($options);
        }

    }