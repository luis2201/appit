<?php

    class MateriaintroductorioController
    {
        public function findmateriaidcarrera()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            
            $idcarrera = Main::decryption($idcarrera);
            $idmatricula = Main::decryption($idmatricula);

            $param = [":idcarrera" => $idcarrera];
            $resp = Materiaintroductorio::findMateriaIdCarrera($param);

            $header = '<table class="table table-condensed table-hver">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Materia</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>';
            $i = 1;
            $rows = '';
            foreach($resp as $row){
                $param = [":idmatricula" => $idmatricula, ":idmateria" => $row->idmateria];
                $valida = Asignarmateria::findMateriaIdMatricula($param); 
                if(count($valida)>0){
                    $estado = 'checked';
                } else{
                    $estado = '';
                }
                $rows .= '<tr>
                            <td class="text-center" style="width:5%">'.$i++.'</td>
                            <td>'.$row->materia.'</td>
                            <td class="text-center">
                                <div class="form-check form-switch">
                                    <input id="'.Main::encryption($row->idmateria).'" class="form-check-input" type="checkbox" onclick="saveMaterias(this)" '.$estado.'>                                    
                                </div>
                            </td>
                        </tr>';
            }

            $footer = '</tbody>
                    </table>';

            echo json_encode($header.$rows.$footer);
        }
    }

?>