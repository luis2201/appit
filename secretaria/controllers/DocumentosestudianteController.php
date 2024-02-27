<?php

    class DocumentosestudianteController
    {
        public function index()
        {
            $niveles = Nivel::findAll();
            $carreras = Carrera::findAll();
            $secciones = Seccion::findAll();

            view("documentosestudiante.index", ["carreras" => $carreras, "secciones" => $secciones, "niveles" => $niveles]);
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
            $idcarrera = Main::decryption($idcarrera);
            $idseccion = Main::decryption($idseccion);
            $idnivel = Main::decryption($idnivel);

            $res = Listasniveles::viewLista($idperiodo, $idcarrera, $idseccion, $modalidad, $idnivel);
            $i = 1;
            foreach($res as $row){
                $rows .= '<tr>
                            <td class="text-center">'.$i++.'</td>
                            <td class="text-center">'.$row->idmatricula.'</td>
                            <td>'.$row->alumnos.'</td>
                            <td>'.$row->numero_identificacion.'</td>
                            <td class="text-center">'.$row->fecha_nacimiento.'</td>
                            <td class="text-center">'.$row->numero_celular.'</td>
                            <td class="text-center"><a class="btn btn-success" href="'.DIR.'documento.php?img='.$row->doc_cedula.'" target="_blank"><i class="fa fa-address-card text-light"></i></a></td>
                            <td class="text-center"><a class="btn btn-success" href="'.DIR.'documento.php?img='.$row->doc_titulo.'" target="_blank"><i class="fa fa-address-card text-light"></i></a></td>
                          </tr>';
            }

            echo json_encode($rows);
        }
    }

?>