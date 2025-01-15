<?php

    class CeieController
    {
        public function index()
        {
            $periodoactivo = Periodo::findActivo();
            $modulos = Ceie::findModulo([":idestudiante" => Main::decryption($_SESSION['idestudiante_appit'])]);

            view("ceie.index", ["modulos" => $modulos, "periodoactivo" =>$periodoactivo]);
        }

        public function insert()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmodulo = Main::limpiar_cadena($data->idmodulo);
            $idestudiante = Main::limpiar_cadena($data->idestudiante);

            $idperiodo = Main::decryption($idperiodo);
            $idmodulo = Main::decryption($idmodulo);
            $idestudiante = Main::decryption($idestudiante);

            $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo];
            $res = Ceie::findIdMatricula($params);
            foreach($res as $row){
                $idmatricula = $row->idmatricula;
            }

            $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula, ":idmodulo" => $idmodulo];
            $res = Ceie::findMatriculaModulo($params);

            if(count($res) == 0){
                $res = Ceie::Insert($params);
            } else{
                $res = false;
            }

            echo json_encode($res);
        }
    }

?>