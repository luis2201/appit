<?php

    class MateriasperfilController
    {
        public function index()
        {
            $materiasperfil = Materiasperfil::findAll();
            $carreras = Carrera::findAll();

            view('materiasperfil.index', ["materiasperfil" => $materiasperfil, "carreras" => $carreras]);
        }

        public function addperfil()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmateria_introductorio = Main::limpiar_cadena($data->idmateria_introductorio);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $isChecked = Main::limpiar_cadena($data->isChecked);

            $idmateria_introductorio = Main::decryption(($idmateria_introductorio));
            $idmateria = Main::decryption(($idmateria));

            $param = [":idmateria_introductorio" => $idmateria_introductorio, ":idmateria" => $idmateria];
            if($isChecked == 1){
                $resp = Materiasperfil::addPerfil($param);
            } else{
                $resp = Materiasperfil::deletePerfil($param);                
            }

            echo json_encode($resp);
        }
    }