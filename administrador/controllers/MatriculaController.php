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

    }