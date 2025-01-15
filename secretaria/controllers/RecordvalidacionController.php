<?php

    class RecordvalidacionController
    {
        public function index()
        {
            $periodo = Periodo::findActivo();
            
            view("recordvalidacion.index", ["periodo" => $periodo]);
        }

        public function viewlista()
        {
            $data = json_decode(file_get_contents('php://input'));
            
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);            
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);            
            
            $res = Listasniveles::viewListaValidacion($idperiodo, $idcarrera, $idnivel);
            $rows = '';
            $i = 1;

            foreach ($res as $row) {
                $encryp = (ctype_lower(substr(Main::encryption($row->numero_identificacion),0,1))) ? ucfirst(Main::encryption($row->numero_identificacion)) : Main::encryption($row->numero_identificacion);                      
                $rows.='<tr id="'.Main::encryption($row->idmatricula).'">
                            <td class="text-center align-middle">'.$i++.'</td>
                            <td class="text-center align-middle">'.$row->idmatricula.'</td>
                            <td class="text-center align-middle">'.$row->numero_identificacion.'</td>
                            <td class="align-middle">'.$row->alumnos.'</td>
                            <td>
                                <a href="recordacademicovalidacion/'.$encryp.'" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                            </td>      
                        </tr>';
            }

            echo json_encode($rows);
        }
    }

?>