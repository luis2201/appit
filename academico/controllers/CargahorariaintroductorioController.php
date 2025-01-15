<?php

class CargahorariaintroductorioController
{
    public function index()
    {
        $periodos = Periodo::findAll();
        
        foreach($periodos as $row){
            $idperiodo = $row->idperiodo;
        }

        $param = [":idperiodo" => $idperiodo];

        $cargahoraria = Cargahorariaintroductorio::findAll($param);
        $carreras = Carrera::findAll();

        view('cargahorariaintroductorio.index', ["cargahoraria" => $cargahoraria, "carreras" => $carreras]);
    }

    public function savedocente()
    {
        $data = json_decode(file_get_contents('php://input'));

        $idperiodo = Main::limpiar_cadena($data->idperiodo);
        $idcarrera = Main::limpiar_cadena($data->idcarrera);
        $idmateria_introductorio = Main::limpiar_cadena($data->idmateria_introductorio);
        $iddocente = Main::limpiar_cadena($data->iddocente);
        $isChecked = Main::limpiar_cadena($data->isChecked);

        $idperiodo = Main::decryption($idperiodo);
        $idcarrera = Main::decryption($idcarrera);
        $idmateria_introductorio = Main::decryption($idmateria_introductorio);
        $iddocente = Main::decryption($iddocente);

        $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idmateria_introductorio" => $idmateria_introductorio, ":iddocente" => $iddocente];
        $resp = Cargahorariaintroductorio::saveDocente($param);
    
        echo json_encode($resp);
    }
}

?>