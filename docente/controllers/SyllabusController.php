<?php

    class ProgramaanaliticoController
    {
        public function index()
        {
            $periodos = Periodo::findActivo();

            view("programaanalitico.index", ["periodos" => $periodos]);
        }
    }

?>