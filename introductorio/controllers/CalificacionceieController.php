<?php

    class CalificacionceieController
    {
        public function index()
        {
            $idestudiante = Main::decryption($_SESSION['idestudiante_appit']);

            $periodo = Periodo::findActivo();
            foreach ($periodo as $row) {
                $idperiodo = $row->idperiodo;
            }

            

            view("calificacionceie.index", []);
        }
    }