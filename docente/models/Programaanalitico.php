<?php

    class Programaanalitico extends DB
    {
        public static function findSyllabusIdDocente($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_syllabus WHERE idperiodo = :idperiodo AND iddocente = :iddocente");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Programaanalitico::class);
        }

        public static function save($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("call sp_syllabus_datos_save(:idperiodo, :iddocente, :idcarrera, :idnivel, :idmateria, :nombreAsignatura, :periodoAcademico, 
            :caracterizacion, :formacionValores, :educacionAmbiental, :objetivos, :competencia, :funciones, :utUnidadTematica1, :utDescripcionTematica1, :utUnidadTematica2, 
            :utDescripcionTematica2, :utUnidadTematica3, :utDescripcionTematica3, :utUnidadTematica4, :utDescripcionTematica4, :metodologia, :procedimientoEvaluacion, 
            :bibliografiaBasica, :bibliografiaComplementaria, :codigoAsignatura, :nombreAsignatura2, :prerrequisito, :correquisito, :carrera, :unidadArticular, 
            :campoFormacion, :periodoAcademico2, :modalidad, :periodoAcademico3, :paralelo, :horarioClase, :horarioTutorias, :profesorAsignatura, :perfilProfesor, 
            :totalHoras, :horasDocencia, :horasPractica, :horasTrabajoAutonomo)");
            
            return $prepare->execute($params);                
        }

        public static function findDatos($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT * FROM tb_syllabus WHERE idperiodo = :idperiodo AND iddocente = :iddocente AND idmateria = :idmateria");            
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Programaanalitico::class);
        }

        public static function findDatosIdSyllabus($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT * FROM tb_syllabus WHERE idsyllabus = :idsyllabus");            
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Programaanalitico::class);
        }

        public static function findEstructura($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT * FROM tb_estructura_syllabus WHERE idsyllabus = :idsyllabus");            
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Programaanalitico::class);
        }

        public static function saveEstructura($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("call sp_syllabus_estructura_save(:idsyllabus, :unidad_tematica, :contenidos, :horas_docencia, 
                                    :horas_practica, :horas_trabajo, :metodos, :recursos, :escenarios, :fuentes, :fecha)");                                            

            return $prepare->execute($params);                
        }

        public static function updateEstructura($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("call sp_syllabus_estructura_update(:idestructura, :utd, :contenidos, :horas_docencia, 
                                    :horas_practica, :horas_trabajo, :metodos, :recursos, :escenarios, :fuentes, :fecha)");                                            

            return $prepare->execute($params);                
        }
        
            
        public static function deleteEstructura($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("DELETE FROM tb_estructura_syllabus WHERE idestructura = :idestructura");

            return $prepare->execute($params);            
        }

        public static function saveLogros($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("call sp_syllabus_logros_save(:idsyllabus, :unidad_tematica, :contenidos, :logros_aprendizaje, :instrumentos_evaluacion, :criterios_evaluacion)");

            return $prepare->execute($params);                
        }

        public static function findLogros($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT * FROM tb_logros_syllabus WHERE idsyllabus = :idsyllabus");            
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Programaanalitico::class);
        }

        public static function saveArticulacion($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("call sp_syllabus_articulacion_save(:idsyllabus, :articulacion_investigacion, :articulacion_vinculacion, :practicas)");

            return $prepare->execute($params);                
        }

        public static function findArticulaciones($params)
        {
            $db = new DB();
            
            $prepare = $db->prepare("SELECT * FROM tb_articulacion_syllabus WHERE idsyllabus = :idsyllabus");            
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Programaanalitico::class);
        }
    }
