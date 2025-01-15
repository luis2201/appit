<?php

    class RegistrotutorController
    {
        public function index()
        {
            $docentes = Docente::findAll();

            view("registrotutor.index", ["docentes" => $docentes]);
        }

        public function findall($idperiodo)
        {
            $idperiodo = Main::limpiar_cadena($idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $res = Tutor::findAll($idperiodo);
            
            echo json_encode($res);
        }
    }

?>