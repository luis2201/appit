<?php

    class PagoadmisionesController
    {
        public function index()
        {
            view("pagoadmisiones.index", []);
        }

        public static function findidentificacion($numero_identificacion)
        {
            $numero_identificacion = Main::limpiar_cadena($numero_identificacion);
            $resp = Pagoadmisiones::findidentificacion($numero_identificacion);

            echo json_encode($resp);
        }

        public static function findcorreo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $correo_electronico = Main::limpiar_cadena($data->correo_electronico);
            $resp = Pagoadmisiones::findcorreo($correo_electronico);

            echo json_encode($resp);
        }

        public function insert()
        {
            $tipo_identificacion   = Main::limpiar_cadena($_POST['tipo_identificacion']);
            $numero_identificacion = Main::limpiar_cadena($_POST['numero_identificacion']);
            $apellido1             = Main::limpiar_cadena($_POST['apellido1']);
            $apellido2             = Main::limpiar_cadena($_POST['apellido2']);
            $nombre1               = Main::limpiar_cadena($_POST['nombre1']);
            $nombre2               = Main::limpiar_cadena($_POST['nombre2']);
            $correo_electronico    = Main::limpiar_cadena($_POST['correo_electronico']);
            $contrasena            = Main::encryption($numero_identificacion);

            $pagoadmisiones = new Pagoadmisiones();
            $pagoadmisiones->tipo_identificacion   = $tipo_identificacion;
            $pagoadmisiones->numero_identificacion = $numero_identificacion;
            $pagoadmisiones->apellido1             = $apellido1;
            $pagoadmisiones->apellido2             = $apellido2;
            $pagoadmisiones->nombre1               = $nombre1;
            $pagoadmisiones->nombre2               = $nombre2;
            $pagoadmisiones->correo_electronico    = $correo_electronico;
            $pagoadmisiones->contrasena            = $contrasena;

            $resp = $pagoadmisiones->insert();

            echo json_encode($resp);
        }

        public static function findadmisionesid($idadmisiones)
        {
            $idadmisiones = Main::limpiar_cadena($idadmisiones);
            $idadmisiones = Main::decryption($idadmisiones);
            
            $resp = Admisiones::findadmisionesId($idadmisiones);
            
            echo json_encode($resp);
        }

        public static function findpagoadmisiones()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idadmisiones = Main::limpiar_cadena($data->idadmisiones);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $resp = Pagoadmisiones::findpagoAdmisiones($idadmisiones, $idperiodo);

            echo json_encode($resp);
        }

        public function insertpago()
        {
            $idadmisiones = Main::limpiar_cadena($_POST['idadmisiones']);
            $idperiodo = Main::limpiar_cadena($_POST['idperiodo']);
            $idperiodo = Main::decryption($idperiodo);
            $valorpagar = Main::limpiar_cadena($_POST['valorpagar']);
            $fechapago = Main::limpiar_cadena($_POST['fechapago']);
            $numerofactura = Main::limpiar_cadena($_POST['numerofactura']);
            $valorpago = Main::limpiar_cadena($_POST['valorpago']);

            $res = Pagoadmisiones::insertPago($idadmisiones, $idperiodo, $valorpagar, $fechapago, $numerofactura, $valorpago);
            
            echo json_encode($res);
        }
        
    }


?>