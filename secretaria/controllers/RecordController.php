<?php

    class RecordController
    {
        public function index()
        {
            $periodo = Periodo::findActivo();

            view("record.index", ["periodo" => $periodo]);
        }

        public function viewlista()
        {
            $data = json_decode(file_get_contents('php://input'));
            
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idseccion = Main::limpiar_cadena($data->idseccion);
            $modalidad = Main::limpiar_cadena($data->modalidad);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);            
            
            $res = Listasniveles::viewLista($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel);
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
                                <a href="recordacademico/'.$encryp.'" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                            </td>      
                        </tr>';
            }

            echo json_encode($rows);
        }

        public function viewlistas()
        {
            $data = json_decode(file_get_contents('php://input'));
            
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $modalidad = Main::limpiar_cadena($data->modalidad);
            $idnivel = Main::limpiar_cadena($data->idnivel);

            $idperiodo = Main::decryption($idperiodo);            
            
            $res = Listasniveles::viewListas($idperiodo, $idcarrera, $modalidad, $idnivel);
            $rows = '';
            $i = 1;

            foreach ($res as $row) {     
                $rows.='<tr id="'.Main::encryption($row->idmatricula).'">
                            <td class="text-center align-middle">'.$i++.'</td>
                            <td class="text-center align-middle">'.$row->idmatricula.'</td>
                            <td class="text-center align-middle">'.$row->numero_identificacion.'</td>
                            <td class="align-middle">'.$row->alumnos.'</td>
                            <td>
                                <form action="recordacademico" method="post" target="_blank">
                                    <input type="hidden" id="numero_identificacion" name="numero_identificacion" value="'.Main::encryption($row->numero_identificacion).'">
                                    <input type="hidden" id="idcarrera" name="idcarrera" value="'.Main::encryption($idcarrera).'">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                </form>
                            </td>      
                        </tr>';
            }

            echo json_encode($rows);
        }

    }