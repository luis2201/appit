<?php 

    class RegistrocalificacionvalidacionController
    {
        public function index()
        {
            view("registrocalificacionvalidacion.index",  []);
        }        

        public function save()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $aporte = Main::limpiar_cadena($data->aporte);
            $lecciones = Main::limpiar_cadena($data->lecciones);
            $tdocencia = Main::limpiar_cadena($data->tdocencia);
            $practica = Main::limpiar_cadena($data->practica);
            $tpractica = Main::limpiar_cadena($data->tpractica);
            $aprendizaje = Main::limpiar_cadena($data->aprendizaje);
            $taprendizaje = Main::limpiar_cadena($data->taprendizaje);
            $resultado = Main::limpiar_cadena($data->resultado);
            $tresultado = Main::limpiar_cadena($data->tresultado);
            $total = Main::limpiar_cadena($data->total);
            
            $idperiodo = Main::decryption($idperiodo);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":idmatricula" => $idmatricula, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel, ":idmateria" => $idmateria, ":aporte" => $aporte, ":lecciones" => $lecciones, ":tdocencia" => $tdocencia, ":practica" => $practica, ":tpractica" => $tpractica, ":aprendizaje" => $aprendizaje, ":taprendizaje" => $taprendizaje, ":resultado" => $resultado, ":tresultado" => $tresultado, ":total" => $total];
            
            $resp = Registrocalificacionvalidacion::Save($params);
            
            echo json_encode($resp);
        }
    }

?>