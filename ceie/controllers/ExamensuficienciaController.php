<?php

    class ExamensuficienciaController
    {
        public function index()
        {
            $periodos = Periodo::findAll();

            view("examensuficiencia.index", ["periodos" => $periodos]);
        }

        public function insert()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmatricula = Main::limpiar_cadena($data->idmatricula);

            $idperiodo = Main::decryption($idperiodo);
            $idmatricula = Main::decryption($idmatricula);

            $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula];
            $resp = Examensuficiencia::Insert($params);
            
            echo json_encode($resp);
        }
    }