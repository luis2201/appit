<?php

    class CambiotipoestudianteController
    {
        public function index()
        {
            $estudiantes = Estudiante::findAll();

            view('cambiotipoestudiante.index', ["estudiantes" => $estudiantes]);
        }

        public function estadovalidacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $estado = Main::limpiar_cadena($data->estado);

            $idestudiante = Main::decryption($idestudiante);

            $params = [":idestudiante" => $idestudiante, ":estado" => $estado];
            $resp = Estudiante::EstadoValidacion($params);

            echo json_encode($params);
        }

        public function estadointroductorio()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $estado = Main::limpiar_cadena($data->estado);

            $idestudiante = Main::decryption($idestudiante);

            $params = [":idestudiante" => $idestudiante, ":estado" => $estado];
            $resp = Estudiante::EstadoIntroductorio($params);

            echo json_encode($resp);
        }

    }