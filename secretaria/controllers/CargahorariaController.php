<?php

    class CargahorariaController
    {
        public function index()
        {
            $docentes = Docente::findAll();
            $carreras = Carrera::findAll();
            $niveles  = Nivel::findAll();
            $secciones = Seccion::findAll();

            view("cargahoraria.index", ["docentes" => $docentes, "carreras" => $carreras, "niveles" => $niveles, "secciones" => $secciones]);
        }

        public function findmateriamalla()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::decryption($data->idperiodo);
            $idcarrera = Main::decryption($data->idcarrera);
            $idnivel = Main::decryption($data->idnivel);

            $result = Materias::findMateriaMalla($idperiodo, $idcarrera, $idnivel);

            echo json_encode($result);
        }

        public function validacarga()
        {
            $iddocente = Main::limpiar_cadena($_POST['iddocente']);
            $iddocente = Main::decryption($_POST['iddocente']);
            $idperiodo = Main::limpiar_cadena($_POST['idperiodo']);
            $idperiodo = Main::decryption($idperiodo); 
            $idcarrera = Main::limpiar_cadena($_POST['idcarrera']);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel   = Main::limpiar_cadena($_POST['idnivel']);
            $idnivel   = Main::decryption($idnivel);
            $idmateria = Main::limpiar_cadena($_POST['idmateria']);
            $idseccion = Main::limpiar_cadena($_POST['idseccion']);
            $idseccion = Main::decryption($idseccion);
            $modalidad = Main::limpiar_cadena($_POST['modalidad']);

            $result = Cargahoraria::validaCarga($iddocente, $idperiodo, $idcarrera, $idnivel, $idmateria, $idseccion, $modalidad);

            echo json_encode($result);
        }

        public function insert()
        {
            $iddocente = Main::limpiar_cadena($_POST['iddocente']);
            $iddocente = Main::decryption($_POST['iddocente']);
            $idperiodo = Main::limpiar_cadena($_POST['idperiodo']);
            $idperiodo = Main::decryption($idperiodo); 
            $idcarrera = Main::limpiar_cadena($_POST['idcarrera']);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel   = Main::limpiar_cadena($_POST['idnivel']);
            $idnivel   = Main::decryption($idnivel);
            $idmateria = Main::limpiar_cadena($_POST['idmateria']);
            $idseccion = Main::limpiar_cadena($_POST['idseccion']);
            $idseccion = Main::decryption($idseccion);
            $modalidad = Main::limpiar_cadena($_POST['modalidad']);
            $horas     = Main::limpiar_cadena($_POST['horas']);

            $cargas = new Cargahoraria();
            $cargas->iddocente = $iddocente;
            $cargas->idperiodo = $idperiodo;
            $cargas->idcarrera = $idcarrera; 
            $cargas->idnivel = $idnivel;
            $cargas->idmateria = $idmateria;
            $cargas->idseccion = $idseccion;
            $cargas->modalidad = $modalidad;
            $cargas->horas = $horas;

            $cargas->insertCarga();

            echo json_encode($cargas);
        }
        
        public function findcargadocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $iddocente = Main::decryption($data->iddocente);
            $idperiodo = Main::decryption($data->idperiodo);

            $result = Cargahoraria::findCargaDocente($iddocente, $idperiodo);

            $i = 1;
            $rows = '';

            foreach($result as $row){
                $rows.= '<tr>
                            <td scope="col" class="text-center">'.$i++.'</td>
                            <td>'.$row->carrera.'</td>
                            <td>'.$row->nivel.'</td>
                            <td>'.$row->seccion.'</td>
                            <td>'.$row->codigo.'</td>
                            <td>'.$row->materia.'</td>
                            <td>'.$row->modalidad.'</td>
                            <td class="text-center">'.$row->horas.'</td>
                            <td><button type="button" id="'.Main::encryption($row->iddetalle_cargahoraria).'" class="form btn btn-sm btn-danger" onclick="eliminaMateria(this.id)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                        </tr>';
            }

            echo json_encode($rows);
        }

        public function totalhorasdocente()
        {
            $data = json_decode(file_get_contents('php://input'));

            $iddocente = Main::decryption($data->iddocente);
            $idperiodo = Main::decryption($data->idperiodo);

            $result = Cargahoraria::totalHorasDocente($iddocente, $idperiodo);

            echo json_encode($result);
        }

        public function deletecargahoraria($iddetalle_cargahoraria)
        {
            $iddetalle_cargahoraria = Main::limpiar_cadena($iddetalle_cargahoraria);
            $iddetalle_cargahoraria = Main::decryption($iddetalle_cargahoraria);

            $params = [":iddetalle_cargahoraria" => $iddetalle_cargahoraria];
            $result = Cargahoraria::deleteCargaHoraria($params);

            echo json_encode($result);
        }

    }

?>