<?php

    class MensajeController
    {
        public function index()
        {
            $params = [":iddocente" => $_SESSION['idusuario_appit']];            
            $mensajes = Mensaje::findAll($params);

            view("mensaje.index", ["mensajes" => $mensajes]);
        }

        public function actualizamensaje($idmensaje)
        {
            $idmensaje = Main::limpiar_cadena($idmensaje);

            $params = [":idmensaje" => $idmensaje];
            $resp = Mensaje::actualizaMensaje($params);

            echo json_encode($resp);
        }

        public function delete($idmensaje)
        {
            $idmensaje = Main::limpiar_cadena($idmensaje);

            $params = [":idmensaje" => $idmensaje];
            $resp = Mensaje::delete($params);

            echo json_encode($resp);
        }
    }