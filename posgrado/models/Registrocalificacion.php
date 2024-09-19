<?php

    class Registrocalificacion extends DB
    {

        public $idmatricula;
        public $idperiodo;
        public $idcarrera;
        public $idnivel;
        public $idmateria;
        public $idparcial;
        public $aporte;
        public $lecciones;
        public $tdocencia;
        public $practica;
        public $tpractica;
        public $aprendizaje;
        public $taprendizaje;
        public $resultado;
        public $tresultado;
        public $total;

        public static function viewListaEstudianteMateria($params)
        {
            $db = new DB();            
            $prepare = $db->prepare("SELECT M.idmatricula, M.numero_matricula, CONCAT(E.apellido1, ' ', E.apellido2, ' ', E.nombre1, ' ', E.nombre2)AS estudiante
                                    FROM tb_matricula M 
                                    INNER JOIN tb_detalle_matricula_introductorio D ON M.idmatricula = D.idmatricula
                                    INNER JOIN tb_materia_introductorio T ON D.idmateria = T.idmateria
                                    INNER JOIN tb_estudiante E ON M.idestudiante = E.idestudiante
                                    WHERE M.idperiodo = :idperiodo
                                    AND T.idmateria = :idmateria
                                    AND E.introductorio = 1
                                    ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2");
                        
            $prepare->execute($params);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacion::class);
        }

        public static function findcalificacionidmatricula($params)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_estudiante_calificacion_introductorio_materia(:idmatricula, :idperiodo, :idmateria, :idparcial);");
            $prepare->execute($params);
    
            return $prepare->fetchAll(PDO::FETCH_CLASS, Registrocalificacion::class);
        }

    }