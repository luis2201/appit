<?php

    class CuadrodocenteController
    {
        public function index()
        {
            $docentes = Docente::findAll();

            view("cuadrodocente.index", ["docentes" => $docentes]);
        }

        public function viewlistaestudiantemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);            
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idparcial = Main::limpiar_cadena($data->idparcial);

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $res = Cuadrodocente::viewListaEstudianteMateria($idperiodo, $idmateria);

            $tbody = '<tbody>';
            $rows = '';
            $cols = '';
            $i = 1;

            foreach ($res as $row) {
                $rows .= '<tr style="height: 20px;">
                            <td class="text-center align-middle" style="width: 5px;">'.$i++.'</td>
                            <td class="text-center align-middle" style="width: 20px;">'.$row->idmatricula.'</td>
                            <td class="align-middle">'.$row->estudiante.'</td>';
                $calificaciones = Cuadrodocente::findcalificacionidmatricula($row->idmatricula, $idperiodo, $idmateria, $idparcial);                
                
                foreach ($calificaciones as $cal) {                    
                    $cols ='<td class="text-center align-middle" style="width: 5%;">'.$cal->aporte.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->lecciones.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->tdocencia.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->practicas.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->tpracticas.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->aprendizaje.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->taprendizaje.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->resultados.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->tresultados.'</td>
                            <td class="text-center align-middle" style="width: 5%;">'.$cal->total.'</td>';
                }                

                $rows .= $cols.'</tr>';
            }

            echo json_encode($rows);
        }

        public function findcalificacionidmatricula()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            
            $res = Cuadrodocente::findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria);

            echo json_encode($res);
        }
    }

?>