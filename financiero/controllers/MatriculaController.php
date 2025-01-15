<?php 

    class MatriculaController
    {
        public function modalidadmatricula()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);

            $idestudiante = Main::decryption($idestudiante);
            
            $params = [":idestudiante" => $idestudiante, ":idperiodo" => $idperiodo];
            $resp = Matricula::findestudiantemodalidad($params);

            echo json_encode($resp);
        }
    }