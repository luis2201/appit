<?php

    class ResumenintroductorioController
    {

        public function index()
        {
            view('resumenintroductorio.index', []);
        }

        public function pdf()
        {
            $idperiodo = Main::limpiar_cadena($_GET['id']);
            $idmateria = Main::limpiar_cadena($_GET['extra1']);

            $idperiodo = Main::decryption($_GET['id']);
            $idmateria = Main::decryption($_GET['extra1']);

            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
            $listaEstudiantes = Calificacionintroductorio::viewListaEstudianteMateria($params);
print_r($listaEstudiantes);
            view('resumenintroductorio.pdf', ["listaEstudiantes" => $listaEstudiantes]);
        }
    }