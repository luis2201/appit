<?php

    class PeriodoController
    {
        public function datosperiodo($idperiodo)
        {
            $idperiodo = Main::limpiar_cadena($idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $params = [":idperiodo" => $idperiodo];
            $resp = Periodo::datosPeriodo($params);

            echo json_encode($resp);
        }
    }

?>