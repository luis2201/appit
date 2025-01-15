<?php

    class ConfiguracioncalificacionesController
    {
        public function index()
        {
            $periodos = Periodo::findAll();

            view('configuracioncalificaciones.index', ["periodos" => $periodos]);
        }

        public function findcalificacionesall()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);
            
            $res = Configuracion::findCalificacionesAll($idperiodo);

            echo json_encode($res);
        }

        public function findconfigid($idconfiguracion)
        {
            $idconfiguracion = Main::limpiar_cadena($idconfiguracion);
            
            $res = Configuracion::findConfigId($idconfiguracion);

            echo json_encode($res);
        }

        public function updateconfig()
        {
            $data = json_decode(file_get_contents('php://input'));
            
            $idconfiguracion = Main::limpiar_cadena($data->idconfiguracion);
            $fecha_apertura = Main::limpiar_cadena($data->fecha_apertura);
            $fecha_cierre = Main::limpiar_cadena($data->fecha_cierre);

            $res = Configuracion::updateConfig($idconfiguracion, $fecha_apertura, $fecha_cierre);

            echo json_encode($res);
        }   
    }

?>