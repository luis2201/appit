<?php

    class EnlineacalificaciontotalController
    {
        public function index()
        {
            $periodo = Periodo::findActivo();

            view("enlineacalificaciontotal.index", ["periodo" => $periodo]);
        }

        public function viewlistaestudiantemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);      
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);

            $res = Enlineacalificaciontotal::viewListaEstudianteMateria($idperiodo, $idmateria);

            echo json_encode($res);
        }

        public function insertcalificacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);      
            $idnivel = Main::limpiar_cadena($data->idnivel);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $total = Main::limpiar_cadena($data->t);
            $supletorio = Main::limpiar_cadena($data->sup);
            $final = Main::limpiar_cadena($data->final);

            $idperiodo = Main::decryption($idperiodo);

            $registros = new Enlineacalificaciontotal();
            $registros->idmatricula = $idmatricula;
            $registros->idperiodo = $idperiodo;
            $registros->idcarrera = $idcarrera;      
            $registros->idnivel = $idnivel;
            $registros->idmateria = $idmateria;
            $registros->total = $total;
            $registros->supletorio = ($supletorio=='')?0:$supletorio;
            $registros->final = $final;

            $res = $registros->insertCalificacion();

            echo json_encode($res);
        }

        public function findcalificacionidmatricula()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);

            $params = [":idmatricula" => $idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
            $res = Enlineacalificaciontotal::findcalificacionidmatricula($params);
            
            echo json_encode($res);
        }
    }

?>