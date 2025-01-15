<?php

    class EstudianteController
    {
        public function findestudianteidmateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);
            
            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria]; 
            $resp = Estudiante::findEstudianteIdMateria($params);
            
            $rows = '';
            $i = 1;

            foreach ($resp as $row) {
                $params = [":idperiodo" => $idperiodo, ":idmatricula" => $row->idmatricula, ":idmateria" => $idmateria];
                $calificaciones = Estudiante::findCalificacionVirtualEstudiante($params);
                foreach ($calificaciones as $calificacion) {
                    $aporte = $calificacion->aporte;
                    $lecciones = $calificacion->lecciones;
                    $tdocencia = $calificacion->tdocencia;
                    $practica = $calificacion->practica;
                    $tpractica = $calificacion->tpractica;
                    $aprendizaje = $calificacion->aprendizaje;
                    $taprendizaje = $calificacion->taprendizaje;
                    $resultado = $calificacion->resultado;
                    $tresultado = $calificacion->tresultado;
                    $total = $calificacion->total;
                }
                
                $rows .= '<tr>
                            <td class="text-center">'.$i++.'</td>
                            <td class="text-center"><input id="mat-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#fff" value="'.$row->idmatricula.'" disabled></td>
                            <td>'.$row->estudiante.'</td>
                            <td><input id="d1-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalDocencia(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$aporte.'"></td>
                            <td><input id="d2-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalDocencia(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$lecciones.'"></td>
                            <td class="text-center" style="background-color:#C0E4FF"><input id="td-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#C0E4FF" value="'.$tdocencia.'" disabled></td>
                            <td><input id="p-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalPractica(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$practica.'"></td>
                            <td class="text-center" style="background-color:#C0E4FF"><input id="tp-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#C0E4FF" value="'.$tpractica.'" disabled></td>
                            <td><input id="au-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalAprendizaje(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$aprendizaje.'"></td>
                            <td class="text-center" style="background-color:#C0E4FF"><input id="tau-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#C0E4FF" value="'.$taprendizaje.'" disabled></td>
                            <td><input id="r-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalResultado(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$resultado.'"></td>
                            <td class="text-center" style="background-color:#C0E4FF"><input id="tr-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#C0E4FF" value="'.$tresultado.'" disabled></td>
                            <td class="text-center" style="background-color:#EAEAEA"><input id="t-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#EAEAEA" value="'.$total.'" disabled></td>
                          </tr>';
    
                $aporte = "";
                $lecciones = "";
                $tdocencia = "";
                $practica = "";
                $tpractica = "";
                $aprendizaje = "";
                $taprendizaje = "";
                $resultado = "";
                $tresultado = "";
                $total = "";
            }

            echo json_encode($rows);
        }

        public function findestudianteidmateriavalidacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);
            
            $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria]; 
            $resp = Estudiante::findEstudianteIdMateriaValidacion($params);
            
            $rows = '';
            $i = 1;

            foreach ($resp as $row) {
                $params = [":idperiodo" => $idperiodo, ":idmatricula" => $row->idmatricula, ":idmateria" => $idmateria];
                $calificaciones = Estudiante::findCalificacionValidacionEstudiante($params);
                foreach ($calificaciones as $calificacion) {
                    $aporte = $calificacion->aporte;
                    $lecciones = $calificacion->lecciones;
                    $tdocencia = $calificacion->tdocencia;
                    $practica = $calificacion->practica;
                    $tpractica = $calificacion->tpractica;
                    $aprendizaje = $calificacion->aprendizaje;
                    $taprendizaje = $calificacion->taprendizaje;
                    $resultado = $calificacion->resultado;
                    $tresultado = $calificacion->tresultado;
                    $total = $calificacion->total;
                }
                
                $rows .= '<tr>
                            <td class="text-center">'.$i++.'</td>
                            <td class="text-center"><input id="mat-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#fff" value="'.$row->idmatricula.'" disabled></td>
                            <td>'.$row->estudiante.'</td>
                            <td><input id="d1-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalDocencia(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$aporte.'"></td>
                            <td><input id="d2-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalDocencia(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$lecciones.'"></td>
                            <td class="text-center" style="background-color:#C0E4FF"><input id="td-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#C0E4FF" value="'.$tdocencia.'" disabled></td>
                            <td><input id="p-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalPractica(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$practica.'"></td>
                            <td class="text-center" style="background-color:#C0E4FF"><input id="tp-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#C0E4FF" value="'.$tpractica.'" disabled></td>
                            <td><input id="au-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalAprendizaje(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$aprendizaje.'"></td>
                            <td class="text-center" style="background-color:#C0E4FF"><input id="tau-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#C0E4FF" value="'.$taprendizaje.'" disabled></td>
                            <td><input id="r-'.$row->idmatricula.'" class="text-center" style="width:70px" onkeyup="totalResultado(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$resultado.'"></td>
                            <td class="text-center" style="background-color:#C0E4FF"><input id="tr-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#C0E4FF" value="'.$tresultado.'" disabled></td>
                            <td class="text-center" style="background-color:#EAEAEA"><input id="t-'.$row->idmatricula.'" class="text-center" style="width:70px; border-style:none; background-color:#EAEAEA" value="'.$total.'" disabled></td>
                          </tr>';
    
                $aporte = "";
                $lecciones = "";
                $tdocencia = "";
                $practica = "";
                $tpractica = "";
                $aprendizaje = "";
                $taprendizaje = "";
                $resultado = "";
                $tresultado = "";
                $total = "";
            }

            echo json_encode($rows);
        }
    }

?>