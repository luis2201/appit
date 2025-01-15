<?php

    class CedulacorreoestudianteController
    {
        public function index()
        {
            $estudiantes = Estudiante::findAll();

            view('cedulacorreoestudiante.index', ["estudiantes" => $estudiantes]);
        }

        public function updatedatos()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idestudiante = Main::limpiar_cadena($data->idestudiante);
            $numero_identificacion = Main::limpiar_cadena($data->numero_identificacion);
            $correo_electroniuno = Main::limpiar_cadena($data->correo_electronico);
            $contrasena = Main::encryption($numero_identificacion);

            $idestudiante = Main::decryption($idestudiante);

            $params = [":idestudiante" => $idestudiante, ":numero_identificacion" => $numero_identificacion, ":correo_electronico" => $correo_electroniuno, ":contrasena" => $contrasena];
            $resp = Estudiante::UpdateDatos($params);

            echo json_encode($resp);
        }
    }