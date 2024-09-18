<?php

    class RegistrocalificacionController
    {

        public function index()
        {
            $periodos = Periodo::findActivo();

            view("registrocalificacion.index", ["periodos" => $periodos]);
        }

    }

?>