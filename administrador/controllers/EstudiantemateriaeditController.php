<?php

    class EstudiantemateriaeditController
    {

        public function index()
        {
            $idmatricula = Main::decryption($_POST["idmatricula"]);

            $param = [":idmatricula" => $idmatricula];
            $datos = Matricula::findDatosMatricula($param);

            view("estudiantemateriaedit.index", ["datos" => $datos]);
        }

    }