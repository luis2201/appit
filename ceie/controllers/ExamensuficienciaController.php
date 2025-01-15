<?php

    class ExamensuficienciaController
    {
        public function index()
        {
            $periodos = Periodo::findActivo();
            foreach($periodos as $row){
                $idperiodo = $row->idperiodo;
            }

            $params = [":idperiodo" => $idperiodo];
            $estudiantes = Estudiantes::findallestudiantesperiodomodulo($params);

            view("examensuficiencia.index", ["periodos" => $periodos, "estudiantes" => $estudiantes]);
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