<?php

    class MatriculaController
    {

        public function finddatosmatricula()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idmatricula = Main::decryption($idmatricula);
            
            $param = [":idmatricula" => $idmatricula];
            $resp = Matricula::findDatosMatricula($param);

            echo json_encode($resp);
        }

        public function editmateriaidmatricula()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idmatricula = Main::decryption($idmatricula);
            $idmateria = Main::decryption($idmateria);
            
            $param = [":idmatricula" => $idmatricula, ":idmateria" => $idmateria];
            $resp = Matricula::validaMateriaIdMatricula($param);

            if(count($resp) == 0) {
                $resp = Matricula::agregaMateriaIdMatricula($param);
            } else {
                $resp = Matricula::eliminaMateriaIdMatricula($param);
            }

            echo json_encode($resp);
        }

    }