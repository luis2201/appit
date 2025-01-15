<?php 

    class MallaController
    {
        public function index()
        {  
            $mallas = Malla::findAll();

            view("malla.index", ["mallas" => $mallas]);
        }

        public function findmaterianivelcarreraperiodo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);

            $params = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel];
            $resp = Malla::findMateriaNivelCarreraPeriodo($params);

            echo json_encode($resp);
        }
    }

?>