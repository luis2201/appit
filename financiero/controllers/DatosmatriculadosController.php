<?php

    class DatosmatriculadosController
    {
        public function index()
        {
            view("datosmatriculados.index", []);
        }

        public function findnumeroidentificacion($numero_identificacion)
        {
            $numero_identificacion = Main::limpiar_cadena($numero_identificacion);

            $params = ['numero_identificacion' => $numero_identificacion];
            $resp = Datosmatriculados::FindNumeroIdentificacion($params);

            echo json_encode($resp);
        }
    }

?>