<?php

    class ProgramaanaliticoController
    {
        public function index()
        {
            $periodos = Periodo::findActivo();

            view("programaanalitico.index", ["periodos" => $periodos]);
        }

        public function finddatos()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idmateria = Main::limpiar_cadena($data->idmateria);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idmateria = Main::decryption($idmateria);

            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idmateria" => $idmateria];
            $resp = Programaanalitico::findDatos($params);

            echo json_encode($resp);
        }

        public function save()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idcarrera = Main::limpiar_cadena($data->idcarrera);
            $idnivel = Main::limpiar_cadena($data->idnivel);
            $idmateria = Main::limpiar_cadena($data->idmateria);        
            $nombreAsignatura = Main::limpiar_cadena($data->nombreAsignatura);
            $periodoAcademico = Main::limpiar_cadena($data->periodoAcademico);
            $caracterizacion = Main::limpiar_cadena($data->caracterizacion);
            $formacionValores = Main::limpiar_cadena($data->formacionValores);
            $educacionAmbiental = Main::limpiar_cadena($data->educacionAmbiental);
            $objetivos = Main::limpiar_cadena($data->objetivos);
            $competencia = Main::limpiar_cadena($data->competencia);
            $funciones = Main::limpiar_cadena($data->funciones);            
            $utUnidadTematica1 = Main::limpiar_cadena($data->utUnidadTematica1);
            $utDescripcionTematica1 = Main::limpiar_cadena($data->utDescripcionTematica1);
            $utUnidadTematica2 = Main::limpiar_cadena($data->utUnidadTematica2);
            $utDescripcionTematica2 = Main::limpiar_cadena($data->utDescripcionTematica2);
            $utUnidadTematica3 = Main::limpiar_cadena($data->utUnidadTematica3);
            $utDescripcionTematica3 = Main::limpiar_cadena($data->utDescripcionTematica3);
            $utUnidadTematica4 = Main::limpiar_cadena($data->utUnidadTematica4);
            $utDescripcionTematica4 = Main::limpiar_cadena($data->utDescripcionTematica4);
            $metodologia = Main::limpiar_cadena($data->metodologia);
            $procedimientoEvaluacion = Main::limpiar_cadena($data->procedimientoEvaluacion);
            $bibliografiaBasica = Main::limpiar_cadena($data->bibliografiaBasica);
            $bibliografiaComplementaria = Main::limpiar_cadena($data->bibliografiaComplementaria);
            $codigoAsignatura = Main::limpiar_cadena($data->codigoAsignatura);
            $nombreAsignatura2 = Main::limpiar_cadena($data->nombreAsignatura2);
            $prerrequisito = Main::limpiar_cadena($data->prerrequisito);
            $correquisito = Main::limpiar_cadena($data->correquisito);
            $carrera = Main::limpiar_cadena($data->carrera);
            $unidadArticular = Main::limpiar_cadena($data->unidadArticular);
            $campoFormacion = Main::limpiar_cadena($data->campoFormacion);
            $periodoAcademico2 = Main::limpiar_cadena($data->periodoAcademico2);
            $modalidad = Main::limpiar_cadena($data->modalidad);
            $periodoAcademico3 = Main::limpiar_cadena($data->periodoAcademico3);
            $paralelo = Main::limpiar_cadena($data->paralelo);
            $horarioClase = Main::limpiar_cadena($data->horarioClase);
            $horarioTutorias = Main::limpiar_cadena($data->horarioTutorias);
            $profesorAsignatura = Main::limpiar_cadena($data->profesorAsignatura);
            $perfilProfesor = Main::limpiar_cadena($data->perfilProfesor);
            $totalHoras = Main::limpiar_cadena($data->totalHoras);
            $horasDocencia = Main::limpiar_cadena($data->horasDocencia);
            $horasPractica = Main::limpiar_cadena($data->horasPractica);
            $horasTrabajoAutonomo = Main::limpiar_cadena($data->horasTrabajoAutonomo);

            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idcarrera = Main::decryption($idcarrera);
            $idnivel = Main::decryption($idnivel);
            $idmateria = Main::decryption($idmateria);

            $params = [
                ":idperiodo" => $idperiodo, 
                ":iddocente" => $iddocente, 
                ":idcarrera" => $idcarrera, 
                ":idnivel" => $idnivel, 
                ":idmateria" => $idmateria, 
                ":nombreAsignatura" => $nombreAsignatura, 
                ":periodoAcademico" => $periodoAcademico, 
                ":caracterizacion" => $caracterizacion, 
                ":formacionValores" => $formacionValores, 
                ":educacionAmbiental" => $educacionAmbiental, 
                ":objetivos" => $objetivos, 
                ":competencia" => $competencia, 
                ":funciones" => $funciones, 
                ":utUnidadTematica1" => $utUnidadTematica1, 
                ":utDescripcionTematica1" => $utDescripcionTematica1, 
                ":utUnidadTematica2" => $utUnidadTematica2, 
                ":utDescripcionTematica2" => $utDescripcionTematica2, 
                ":utUnidadTematica3" => $utUnidadTematica3, 
                ":utDescripcionTematica3" => $utDescripcionTematica3, 
                ":utUnidadTematica4" => $utUnidadTematica4, 
                ":utDescripcionTematica4" => $utDescripcionTematica4, 
                ":metodologia" => $metodologia, 
                ":procedimientoEvaluacion" => $procedimientoEvaluacion, 
                ":bibliografiaBasica" => $bibliografiaBasica, 
                ":bibliografiaComplementaria" => $bibliografiaComplementaria, 
                ":codigoAsignatura" => $codigoAsignatura, 
                ":nombreAsignatura2" => $nombreAsignatura2, 
                ":prerrequisito" => $prerrequisito, 
                ":correquisito" => $correquisito, 
                ":carrera" => $carrera, 
                ":unidadArticular" => $unidadArticular, 
                ":campoFormacion" => $campoFormacion, 
                ":periodoAcademico2" => $periodoAcademico2, 
                ":modalidad" => $modalidad, 
                ":periodoAcademico3" => $periodoAcademico3, 
                ":paralelo" => $paralelo, 
                ":horarioClase" => $horarioClase, 
                ":horarioTutorias" => $horarioTutorias, 
                ":profesorAsignatura" => $profesorAsignatura, 
                ":perfilProfesor" => $perfilProfesor, 
                ":totalHoras" => $totalHoras, 
                ":horasDocencia" => $horasDocencia, 
                ":horasPractica" => $horasPractica, 
                ":horasTrabajoAutonomo" => $horasTrabajoAutonomo                
            ];

            $resp = Programaanalitico::save($params);

            echo json_encode($resp);
        }

        public function saveestructura()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idsyllabus = Main::limpiar_cadena($data->idsyllabus);
            $unidad_tematica = Main::limpiar_cadena($data->unidad_tematica);
            $contenidos = Main::limpiar_cadena($data->contenidos);
            $horas_docencia = Main::limpiar_cadena($data->horas_docencia);
            $horas_practica = Main::limpiar_cadena($data->horas_practica);
            $horas_trabajo = Main::limpiar_cadena($data->horas_trabajo);
            $metodos = Main::limpiar_cadena($data->metodos);
            $recursos = Main::limpiar_cadena($data->recursos);
            $escenarios = Main::limpiar_cadena($data->escenarios);
            $fuentes = Main::limpiar_cadena($data->fuentes);
            $fecha = Main::limpiar_cadena($data->fecha);

            $params = [
                ":idsyllabus" => $idsyllabus, ":unidad_tematica" => $unidad_tematica, ":contenidos" => $contenidos, 
                ":horas_docencia" => $horas_docencia, ":horas_practica" => $horas_practica, ":horas_trabajo" => $horas_trabajo,
                ":metodos" => $metodos, ":recursos" => $recursos, ":escenarios" => $escenarios, ":fuentes" => $fuentes, ":fecha" => $fecha
            ]; 

            $resp = Programaanalitico::saveEstructura($params);

            echo json_encode($resp);
        }

        public function findestructura()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idsyllabus = Main::limpiar_cadena($data->idsyllabus);

            $params = [":idsyllabus" => $idsyllabus]; 
            $resp = Programaanalitico::findEstructura($params);

            echo json_encode($resp);
        }

        public function updateestructura()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idestructura = Main::limpiar_cadena($data->idestructura);            
            $utd = Main::limpiar_cadena($data->utd);
            $contenidos = Main::limpiar_cadena($data->contenidos);
            $horas_docencia = Main::limpiar_cadena($data->horas_docencia);
            $horas_practica = Main::limpiar_cadena($data->horas_practica);
            $horas_trabajo = Main::limpiar_cadena($data->horas_trabajo);
            $metodos = Main::limpiar_cadena($data->metodos);
            $recursos = Main::limpiar_cadena($data->recursos);
            $escenarios = Main::limpiar_cadena($data->escenarios);
            $fuentes = Main::limpiar_cadena($data->fuentes);
            $fecha = Main::limpiar_cadena($data->fecha);

            $params = [
                ":idestructura" => $idestructura, ":utd" => $utd, ":contenidos" => $contenidos, 
                ":horas_docencia" => $horas_docencia, ":horas_practica" => $horas_practica, ":horas_trabajo" => $horas_trabajo,
                ":metodos" => $metodos, ":recursos" => $recursos, ":escenarios" => $escenarios, ":fuentes" => $fuentes, ":fecha" => $fecha
            ]; 

            $resp = Programaanalitico::updateEstructura($params);

            echo json_encode($resp);
        }

        public function deleteestructura()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idestructura = Main::limpiar_cadena($data->idestructura);

            $params = [":idestructura" => $idestructura]; 
            $resp = Programaanalitico::deleteEstructura($params);

            echo json_encode($resp);
        }

        public function savelogros()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idsyllabus = Main::limpiar_cadena($data->idsyllabus);

            $unidad_tematica1 = Main::limpiar_cadena($data->ut1);
            $contenidos1 = Main::limpiar_cadena($data->co1);
            $logros_aprendizaje1 = Main::limpiar_cadena($data->lo1);
            $instrumentos_evaluacion1 = Main::limpiar_cadena($data->in1);
            $criterios_evaluacion1 = Main::limpiar_cadena($data->ce1);

            $unidad_tematica2 = Main::limpiar_cadena($data->ut2);
            $contenidos2 = Main::limpiar_cadena($data->co2);
            $logros_aprendizaje2 = Main::limpiar_cadena($data->lo2);
            $instrumentos_evaluacion2 = Main::limpiar_cadena($data->in2);
            $criterios_evaluacion2 = Main::limpiar_cadena($data->ce2);

            $unidad_tematica3 = Main::limpiar_cadena($data->ut3);
            $contenidos3 = Main::limpiar_cadena($data->co3);
            $logros_aprendizaje3 = Main::limpiar_cadena($data->lo3);
            $instrumentos_evaluacion3 = Main::limpiar_cadena($data->in3);
            $criterios_evaluacion3 = Main::limpiar_cadena($data->ce3);

            $unidad_tematica3 = Main::limpiar_cadena($data->ut3);
            $contenidos3 = Main::limpiar_cadena($data->co3);
            $logros_aprendizaje3 = Main::limpiar_cadena($data->lo3);
            $instrumentos_evaluacion3 = Main::limpiar_cadena($data->in3);
            $criterios_evaluacion3 = Main::limpiar_cadena($data->ce3);

            $unidad_tematica4 = Main::limpiar_cadena($data->ut4);
            $contenidos4 = Main::limpiar_cadena($data->co4);
            $logros_aprendizaje4 = Main::limpiar_cadena($data->lo4);
            $instrumentos_evaluacion4 = Main::limpiar_cadena($data->in4);
            $criterios_evaluacion4 = Main::limpiar_cadena($data->ce4);

            $params = [":idsyllabus" => $idsyllabus, ":unidad_tematica" => $unidad_tematica1, ":contenidos" => $contenidos1, ":logros_aprendizaje" => $logros_aprendizaje1, ":instrumentos_evaluacion" => $instrumentos_evaluacion1, ":criterios_evaluacion" => $criterios_evaluacion1]; 
            $resp = Programaanalitico::saveLogros($params);

            $params = [":idsyllabus" => $idsyllabus, ":unidad_tematica" => $unidad_tematica2, ":contenidos" => $contenidos2, ":logros_aprendizaje" => $logros_aprendizaje2, ":instrumentos_evaluacion" => $instrumentos_evaluacion2, ":criterios_evaluacion" => $criterios_evaluacion2]; 
            $resp = Programaanalitico::saveLogros($params);

            $params = [":idsyllabus" => $idsyllabus, ":unidad_tematica" => $unidad_tematica3, ":contenidos" => $contenidos3, ":logros_aprendizaje" => $logros_aprendizaje3, ":instrumentos_evaluacion" => $instrumentos_evaluacion3, ":criterios_evaluacion" => $criterios_evaluacion3]; 
            $resp = Programaanalitico::saveLogros($params);

            $params = [":idsyllabus" => $idsyllabus, ":unidad_tematica" => $unidad_tematica4, ":contenidos" => $contenidos4, ":logros_aprendizaje" => $logros_aprendizaje4, ":instrumentos_evaluacion" => $instrumentos_evaluacion4, ":criterios_evaluacion" => $criterios_evaluacion4]; 
            $resp = Programaanalitico::saveLogros($params);


            echo json_encode($resp);
        }

        public function findlogros()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idsyllabus = Main::limpiar_cadena($data->idsyllabus);

            $params = [":idsyllabus" => $idsyllabus]; 
            $resp = Programaanalitico::findLogros($params);

            echo json_encode($resp);
        }

        public function savearticulacion()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idsyllabus = Main::limpiar_cadena($data->idsyllabus);
            $articulacion_investigacion = Main::limpiar_cadena($data->articulacion_investigacion);
            $articulacion_vinculacion = Main::limpiar_cadena($data->articulacion_vinculacion);
            $practicas = Main::limpiar_cadena($data->practicas);
            
            $params = [":idsyllabus" => $idsyllabus, ":articulacion_investigacion" => $articulacion_investigacion, ":articulacion_vinculacion" => $articulacion_vinculacion, ":practicas" => $practicas]; 

            $resp = Programaanalitico::saveArticulacion($params);

            echo json_encode($resp);
        }

        public function findarticulaciones()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idsyllabus = Main::limpiar_cadena($data->idsyllabus);

            $params = [":idsyllabus" => $idsyllabus]; 
            $resp = Programaanalitico::findArticulaciones($params);

            echo json_encode($resp);
        }
    }

?>