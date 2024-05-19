<?php

    class MatriculadosporsexointroductorioController
    {
        public function index()
        {
            $periodostodos = Periodo::findActivo();

            view('matriculadosporsexointroductorio.index', ["periodostodos" => $periodostodos]);
        }

        public function findsexointroductorioidperiodo()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $rows = '';
            $i = 1;

            $param = [":idperiodo" => $idperiodo];
            $resp = Carrera::findCarreraPeriodo($param);
            foreach($resp as $row){
                $param = [":idperiodo" => $idperiodo, ":idcarrera" => $row->idcarrera];
                $resp = Matriculadosporsexo::findSexoIntroductorioIdPeriodo($param);

                foreach($resp as $estadistica){
                    $masculino = $estadistica->masculino;
                    $femenino = $estadistica->femenino;
                }

                $rows.='<tr>
                            <td>'.$i++.'</td>
                            <td>'.$row->carrera.'</td>
                            <td class="text-center">'.$masculino.'</td>
                            <td class="text-center">'.$femenino.'</td>
                        </tr>';    
            }
            // $resp = Matriculadosporsexo::findSexoCarreraIdPeriodo($param);


            echo json_encode($rows);
        }
    }

?>