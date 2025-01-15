<?php

    class CertificadosuficienciaController
    {
        public function index()
        {
            $periodos = Periodo::findAll();

            view("certificadosuficiencia.index", ["periodos" => $periodos]);
        }

        public function findallestudiantessuficiencia()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idperiodo = Main::decryption($idperiodo);

            $param = [':idperiodo' => $idperiodo];
            $result = Estudiantes::findAllEstudiantesSuficiencia([":idperiodo" => $idperiodo]);
            $rows = '';
            foreach($result as $row) {                     
                $encryp = (ctype_lower(substr(Main::encryption($row->idmatricula),0,1))) ? ucfirst(Main::encryption($row->idmatricula)) : Main::encryption($row->idmatricula);
                
                $rows .= '<tr>
                            <td class="text-center" style="width: 20%">'.$row->idmatricula.'</td>
                            <td>'.$row->estudiante.'</td>
                            <td class="text-center">'.$row->calificacion.'</td>
                            <td class="text-center" style="width: 20%">
                                <a href="suficienciapdf/'.$encryp.'" class="btn btn-success btn-sm" target="_blank">
                                    <i class="fa fa-print"></i>
                                    Imprimir Certificado
                                </a>
                            </td>
                        </tr>';
            }

            echo json_encode($rows);
        }

    }