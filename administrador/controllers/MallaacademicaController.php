<?php

    class MallaacademicaController
    {

        public function index()
        {
            $periodos = Periodo::findActivo();
            foreach($periodos as $row){
                $idperiodo = $row->idperiodo;
            }

            $param = [":idperiodo" => $idperiodo];
            $carreras = Carrera::findCarreraIdPeriodo($param);

            view("mallaacademica.index", ["periodos" => $periodos, "carreras" => $carreras]);
        }

        public function findmallaidperiodo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $modalidad = Main::limpiar_cadena($data->modalidad);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":modalidad" => $modalidad, ":idnivel" => $idnivel];
            $resp = Mallaacademica::findMallaIdPeriodo($param);
            
            echo json_encode($param);
        }

    }