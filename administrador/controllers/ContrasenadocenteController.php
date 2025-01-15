<?php

    class ContrasenadocenteController
    {
        public function index()
        {
            $docentes = Docente::findAll();

            view('contrasenadocente.index', ["docentes" => $docentes]);
        }

        public function revela()
        {
            $data = json_decode(file_get_contents('php://input'));

            $currentPassword = Main::limpiar_cadena($data->currentPassword);
            $currentPassword = Main::decryption($currentPassword);

           echo json_encode($currentPassword);
        }
    }