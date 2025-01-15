<?php

    class RecordenlineapdfController
    {
        public function index()
        {
            $periodo = Periodo::findActivo();

            view("recordenlineapdf.index", ["periodo" => $periodo]);
        }
    }

?>