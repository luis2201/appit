<?php

    class PerfilestudianteController
    {
        public function index()
        {
            $paises = Pais::findAll();
            $ciudades = Ciudad::findAll();

            view("perfilestudiante.index", ["paises" => $paises, "ciudades" => $ciudades]);
        }
    }