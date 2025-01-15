<?php

    class EstudiantemateriaController
    {

        public function index()
        {
            $periodos = Periodo::findActivo();
            foreach($periodos as $row){
                $idperiodo = $row->idperiodo;
            }

            $param = [":idperiodo" => $idperiodo];
            $carreras = Carrera::findCarreraIdPeriodo($param);

            view("estudiantemateria.index", ["periodos" => $periodos, "carreras" => $carreras]);
        }

    }