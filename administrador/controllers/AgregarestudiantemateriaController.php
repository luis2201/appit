<?php

    class AgregarestudiantemateriaController
    {

        public function index()
        {
            $periodos = Periodo::FindActivo();
            foreach($periodos as $row){
                $idperiodo = $row->idperiodo;
            }

            $param = [":idperiodo" => $idperiodo];
            $carreras = Carrera::findCarreraIdPeriodo($param);

            view('agregarestudiantemateria.index', ["periodos" => $periodos, "carreras" => $carreras]);
        }

    }