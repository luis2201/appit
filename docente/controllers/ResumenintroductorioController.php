<?php

    class ResumenintroductorioController
    {

        public function index()
        {
            view('resumenintroductorio.index', []);
        }

        public function pdf()
        {
            view('resumenintroductorio.pdf', []);
        }
    }