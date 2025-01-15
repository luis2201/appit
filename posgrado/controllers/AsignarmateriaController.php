<?php

    class AsignarmateriaController
    {
        
        public function index()
        {
            $periodos = Periodo::findAll();
            $carreras = Carrera::findAll();

            view('asignarmateria.index', ["periodos" => $periodos, "carreras" => $carreras]);
        }

        public function savemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $isChecked = Main::limpiar_cadena($data->isChecked);

            $idmatricula = Main::decryption($idmatricula);
            $idmateria = Main::decryption($idmateria);
            
            $param = [":idmatricula" => $idmatricula, ":idmateria" => $idmateria];
            if($isChecked){
                $resp = Asignarmateria::saveMateria($param);
            } else{
                $resp = Asignarmateria::deleteMateria($param);
            }

            echo json_encode($resp);
        }
        
    }