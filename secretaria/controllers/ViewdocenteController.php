<?php

    class ViewdocenteController
    {

        public function index()
        {
            $iddocente = explode("?", $_SERVER['REQUEST_URI']);
            $iddocente = Main::decryption($iddocente[1]);

            $paises = Pais::findAll();
            $provincias = Provincia::findAll();
            $docente = Docente::findID($iddocente);
            view('viewdocente.index', ["iddocente" => $iddocente[1], "docente" => $docente]);
        }

    }

?>