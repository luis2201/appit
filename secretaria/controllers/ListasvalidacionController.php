<?php

    class ListasvalidacionController
    {
        public function index()
        {
            $niveles = Nivel::findAll();
            $carreras = Carrera::findAll();

            view("listasvalidacion.index", ["carreras" => $carreras, "niveles" => $niveles]);
        }

        public function viewlista()
        {
            $data = json_decode(file_get_contents('php://input'));
            
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);

            $res = Listasvalidacion::viewLista($idperiodo, $idcarrera, $idnivel);
            
            echo json_encode($res);
        }
    }

?>