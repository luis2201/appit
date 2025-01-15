<?php

    class RecordController
    {

        public function index()
        {
            $periodos = Periodo::findAll();
            $carreras = Carrera::findAll();

            view('record.index', ["periodos" => $periodos, "carreras" => $carreras]);
        }

    }