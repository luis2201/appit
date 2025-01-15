<?php

    class NotasController
    {
        public function index()
        {
            view("notas.index", []);
        }

        public function findallid()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idparcial = Main::limpiar_cadena($data->idparcial);
            $idestudiante = Main::limpiar_cadena($data->idestudiante);

            $idperiodo = Main::decryption($idperiodo);
            $idestudiante = Main::decryption($idestudiante);

            $res = Notas::findAll_ID($idperiodo, $idparcial, $idestudiante);

            echo json_encode($res);
        }
    }

?>