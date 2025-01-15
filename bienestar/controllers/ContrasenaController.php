<?php

    class ContrasenaController
    {
        public function index()
        {
            view('contrasena.index', []);
        }

        public function passwordvalidate()
        {
            $data = json_decode(file_get_contents('php://input'));

            $iddocente = Main::limpiar_cadena($data->iddocente);
            $contrasena = Main::limpiar_cadena($data->contrasenaactual);

            $iddocente = Main::decryption($iddocente);
            $contrasena = Main::encryption($contrasena);

            $res = Contrasena::passwordValidate($iddocente, $contrasena);

            echo json_encode($res);

        }

        public function passwordchange(){
            $iddocente = Main::limpiar_cadena($_POST['iddocente']);
            $contrasena = Main::limpiar_cadena($_POST['nuevacontrasena']);

            $iddocente = Main::decryption($iddocente);
            $contrasena = Main::encryption($contrasena);

            $contrasenas = new Contrasena();
            $contrasenas->iddocente = $iddocente;
            $contrasenas->contrasena = $contrasena;

            $contrasenas->passwordChange();

            echo json_encode($contrasenas);
        }
    }

?>