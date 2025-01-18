<?php

    class RegistrocalificacionvirtualController
    {
        public function index()
        {
            // $carreras = Carrera::findCarreraIdDocente([":idperiodo" => 17, ":iddocente" => $_SESSION["idusuario_appit"]]);
            // $param = [":idperiodo" => 21, ":iddocente" => $_SESSION["idusuario_appit"]];
            // $materias = Materia::findMateriaIdDocente($param);
            
            // view("registrocalificacionvirtual.index", ["materias" => $materias]);
            view("registrocalificacionvirtual.index", []);
        }

        public function viewlistaestudiantemateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);      
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idparcial = Main::limpiar_cadena($data->idparcial);

            // $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);
            $rows = '';
            $cols = '';
            $i = 1;

            $res = Registrocalificacionvirtual::viewListaEstudianteMateria($idperiodo, $idmateria);
            foreach ($res as $row) {
                $rows .= '<tr style="height: 20px; font-size:0.9vw">
                            <td class="text-center align-middle" style="width:3%;">'.$i++.'</td>
                            <td class="text-center align-middle" style="width:3%;"><input id="idmatricula-'.$row->idmatricula.'" type="text" style="background: #fff; border: 0; width:40px; text-align: center;" value="'.$row->idmatricula.'" disabled></td>
                            <td class="align-middle">'.$row->estudiante.'</td>';

                $calificaciones = Registrocalificacionvirtual::findcalificacionidmatricula($row->idmatricula, $idperiodo, $idmateria, $idparcial);
                if(count($calificaciones)>0){
                    foreach ($calificaciones as $cal) {               
                        $aporte = (!is_null($cal->aporte))?number_format($cal->aporte,2):number_format(0,2); 
                        $lecciones = (!is_null($cal->lecciones))?number_format($cal->lecciones,2):number_format(0,2); 
                        $tdocencia = (!is_null($cal->tdocencia))?number_format($cal->tdocencia,2):number_format(0,2); 
                        $practicas = (!is_null($cal->practica))?number_format($cal->practica,2):number_format(0,2); 
                        $tpracticas = (!is_null($cal->tpractica))?number_format($cal->tpractica,2):number_format(0,2); 
                        $aprendizaje = (!is_null($cal->aprendizaje))?number_format($cal->aprendizaje,2):number_format(0,2); 
                        $taprendizaje = (!is_null($cal->taprendizaje))?number_format($cal->taprendizaje,2):number_format(0,2); 
                        $resultados = (!is_null($cal->resultado))?number_format($cal->resultado,2):number_format(0,2); 
                        $tresultados = (!is_null($cal->tresultado))?number_format($cal->tresultado,2):number_format(0,2); 
                        $total = (!is_null($cal->total))?number_format($cal->total,2):number_format(0,2);                          
                        
                        $cols =  '<td class="text-center align-middle" style="width:5%;"><input id="d1-'.$row->idmatricula.'" type="text" style="border: 0; background: #fff; text-align: center; width:40px;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalDocencia(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$aporte.'"></td>
                                <td class="text-center align-middle" style="width:5%;"><input id="d2-'.$row->idmatricula.'" type="text" style="border: 0; background: #fff; width:40px; text-align: center;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalDocencia(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$lecciones.'"></td>
                                <td class="text-center align-middle" style="background-color:#DCDCDC; width:5%;"><input id="td-'.$row->idmatricula.'" type="text" style="background: #DCDCDC; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$tdocencia.'" disabled></td>
                                <td class="text-center align-middle" style="width:5%;"><input id="p-'.$row->idmatricula.'" type="text" style="border: 0; width:40px; text-align: center;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalPractica(this.id); total(this.id);"  onkeypress="return filterFloat(event,this);" value="'.$practicas.'"></td>
                                <td class="text-center align-middle" style="background-color:#DCDCDC; width:5%;"><input id="tp-'.$row->idmatricula.'" type="text" style="background: #DCDCDC; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$tpracticas.'" disabled></td>
                                <td class="text-center align-middle" style="width:5%;"><input id="au-'.$row->idmatricula.'" type="text" style="border: 0; width:40px; text-align: center;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalAprendizaje(this.id); total(this.id);"  onkeypress="return filterFloat(event,this);" value="'.$aprendizaje.'"></td>
                                <td class="text-center align-middle" style="background-color:#DCDCDC; width:5%;"><input id="tau-'.$row->idmatricula.'" type="text" style="background: #DCDCDC; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$taprendizaje.'" disabled></td>
                                <td class="text-center align-middle" style="width:5%;"><input id="r-'.$row->idmatricula.'" type="text" style="border: 0; width:40px; text-align: center;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalResultado(this.id); total(this.id);"  onkeypress="return filterFloat(event,this);" value="'.$resultados.'"></td>
                                <td class="text-center align-middle" style="background-color:#DCDCDC; width:5%;"><input id="tr-'.$row->idmatricula.'" type="text" style="background: #DCDCDC; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$tresultados.'" disabled></td>
                                <td class="text-center align-middle" style="background-color:#B5DAFF; width:5%;"><input id="t-'.$row->idmatricula.'" type="text" style="background: #B5DAFF; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$total.'" disabled></td>';
                    }
                } else{
                    $aporte = number_format(0,2); 
                    $lecciones = number_format(0,2); 
                    $tdocencia = number_format(0,2); 
                    $practicas = number_format(0,2); 
                    $tpracticas = number_format(0,2); 
                    $aprendizaje = number_format(0,2); 
                    $taprendizaje = number_format(0,2); 
                    $resultados = number_format(0,2); 
                    $tresultados = number_format(0,2); 
                    $total = number_format(0,2);  
                    
                    $cols =  '<td class="text-center align-middle" style="width:5%;"><input id="d1-'.$row->idmatricula.'" type="text" style="border: 0; background: #fff; text-align: center; width:40px;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalDocencia(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$aporte.'"></td>
                                <td class="text-center align-middle" style="width:5%;"><input id="d2-'.$row->idmatricula.'" type="text" style="border: 0; background: #fff; width:40px; text-align: center;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalDocencia(this.id); total(this.id);" onkeypress="return filterFloat(event,this);" value="'.$lecciones.'"></td>
                                <td class="text-center align-middle" style="background-color:#DCDCDC; width:5%;"><input id="td-'.$row->idmatricula.'" type="text" style="background: #DCDCDC; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$tdocencia.'" disabled></td>
                                <td class="text-center align-middle" style="width:5%;"><input id="p-'.$row->idmatricula.'" type="text" style="border: 0; width:40px; text-align: center;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalPractica(this.id); total(this.id);"  onkeypress="return filterFloat(event,this);" value="'.$practicas.'"></td>
                                <td class="text-center align-middle" style="background-color:#DCDCDC; width:5%;"><input id="tp-'.$row->idmatricula.'" type="text" style="background: #DCDCDC; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$tpracticas.'" disabled></td>
                                <td class="text-center align-middle" style="width:5%;"><input id="au-'.$row->idmatricula.'" type="text" style="border: 0; width:40px; text-align: center;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalAprendizaje(this.id); total(this.id);"  onkeypress="return filterFloat(event,this);" value="'.$aprendizaje.'"></td>
                                <td class="text-center align-middle" style="background-color:#DCDCDC; width:5%;"><input id="tau-'.$row->idmatricula.'" type="text" style="background: #DCDCDC; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$taprendizaje.'" disabled></td>
                                <td class="text-center align-middle" style="width:5%;"><input id="r-'.$row->idmatricula.'" type="text" style="border: 0; width:40px; text-align: center;" onfocus="focusIn(this.id)" onfocusout="focusOut(this.id)" onkeyup="totalResultado(this.id); total(this.id);"  onkeypress="return filterFloat(event,this);" value="'.$resultados.'"></td>
                                <td class="text-center align-middle" style="background-color:#DCDCDC; width:5%;"><input id="tr-'.$row->idmatricula.'" type="text" style="background: #DCDCDC; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$tresultados.'" disabled></td>
                                <td class="text-center align-middle" style="background-color:#B5DAFF; width:5%;"><input id="t-'.$row->idmatricula.'" type="text" style="background: #B5DAFF; border: 0; font-weight: bold; text-align: center; width:40px;" value="'.$total.'" disabled></td>';        
                }

                $rows .= $cols.'</tr>';        
            }
            
            echo json_encode($rows);
        }

        public function insertcalificacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);      
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idparcial = Main::limpiar_cadena($data->idparcial);
            $aporte = Main::limpiar_cadena($data->aporte);
            $lecciones = Main::limpiar_cadena($data->lecciones);
            $tdocencia = Main::limpiar_cadena($data->tdocencia);
            $practica = Main::limpiar_cadena($data->practica);
            $tpractica = Main::limpiar_cadena($data->tpractica);
            $aprendizaje = Main::limpiar_cadena($data->aprendizaje);
            $taprendizaje = Main::limpiar_cadena($data->taprendizaje);
            $resultado = Main::limpiar_cadena($data->resultado);
            $tresultado = Main::limpiar_cadena($data->tresultado);
            $total = Main::limpiar_cadena($data->total);

            // $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);

            $registros = new Registrocalificacionvirtual();
            $registros->idmatricula = $idmatricula;
            $registros->idperiodo = $idperiodo;      
            $registros->idmateria = $idmateria;
            $registros->idparcial = $idparcial;
            $registros->aporte = $aporte;
            $registros->lecciones = $lecciones;
            $registros->tdocencia = $tdocencia;
            $registros->practica = $practica;
            $registros->tpractica = $tpractica;
            $registros->aprendizaje = $aprendizaje;
            $registros->taprendizaje = $taprendizaje;
            $registros->resultado = $resultado;
            $registros->tresultado = $tresultado;
            $registros->total = $total;

            $res = $registros->insertCalificacion();

            echo json_encode($res);
        }

        public function findcalificacionidmatricula()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmatricula = Main::limpiar_cadena($data->idmatricula);
            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idparcial = Main::limpiar_cadena($data->idparcial);
            
            $idperiodo = Main::decryption($idperiodo);
            $idmateria = Main::decryption($idmateria);
            
            $res = Registrocalificacionvirtual::findcalificacionidmatricula($idmatricula, $idperiodo, $idmateria, $idparcial);

            echo json_encode($res);
        }
    }

?>