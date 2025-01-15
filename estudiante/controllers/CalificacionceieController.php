<?php

    class CalificacionceieController
    {
        public function index()
        {
            $idestudiante = Main::decryption($_SESSION['idestudiante_appit']);

            $param = [":idestudiante" => $idestudiante];
            $calificaciones = Calificacionceie::findCalificacionId($param);

            view("calificacionceie.index", ["calificaciones" => $calificaciones]);
        }
    }