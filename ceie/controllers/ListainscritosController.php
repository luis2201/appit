<?php

    class ListainscritosController
    {
        public function index()
        {
            $periodos = Periodo::findAll();

            view("listainscritos.index", ["periodos" => $periodos]);
        }

        public function findidmodulo()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmodulo = Main::limpiar_cadena($data->idmodulo);
            $rows = '';

            $idperiodo = Main::decryption($idperiodo);
            $idmodulo = Main::decryption($idmodulo);

            $i = 1;
            $params = [":idperiodo" => $idperiodo, ":idmodulo" => $idmodulo];
            $res = Listainscritos::findModulo($params);

            $i = 1;
            $rows = array();
            foreach ($res as $row) {                
                switch ($row->idmodulo) {
                    case 1:
                      $modulo = 'A1.1 (Módulo 1)';
                      break;
                    case 2:
                      $modulo = 'A1.2 (Módulo 2)';
                      break;
                    case 3:
                      $modulo = 'A2.1 (Módulo 3)';
                      break;
                    case 4:
                      $modulo = 'A2.2 (Módulo 4)';
                      break;
                }

                array_push($rows, ["numero" => $i++, "estudiante" => $row->estudiante, "modulo" => $modulo, "periodo" => $row->periodo]);
            }

            echo json_encode($rows);
        }
    }

?>