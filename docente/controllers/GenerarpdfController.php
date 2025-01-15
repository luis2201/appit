<?php

    class GenerarpdfController
    {
        public function index()
        {
            $periodos = Periodo::findActivo();            

            view("generarpdf.index", ["periodos" => $periodos]);
        }
        
    }