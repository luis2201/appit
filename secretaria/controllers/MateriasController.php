<?php

    class MateriasController
    {
        public function index()
        {
            $materias = Materias::findAll();

            view("materias.index", ["materias" => $materias]);
        }
    }

?>