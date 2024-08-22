<?php

    class ResumenintroductorioController
    {

        public function index()
        {
            view('resumenintroductorio.index', []);
        }

        public function pdf()
        {
            $idperiodo = $_GET['p1'];
            $idmateria = $_GET['p2'];

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];

            view('resumenintroductorio.pdf', ["params" => $params]);
        }
    }