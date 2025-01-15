<?php

    class Resumen extends DB
    {
        public static function findIdMatricula($params)
        {
          $db = new DB();
    
          $prepare = $db->prepare("SELECT M.idmatricula FROM tb_estudiante E
                                    INNER JOIN tb_matricula M ON E.idestudiante = M.idestudiante
                                    WHERE M.idperiodo  = :idperiodo
                                    AND M.idestudiante = :idestudiante");
          $prepare->execute($params);
    
          return $prepare->fetchAll(PDO::FETCH_CLASS, Resumen::class);
        }
    
        public static function findNivelCarrera($params)
        {
          $db = new DB();
    
          $prepare = $db->prepare("SELECT N.nivel, C.carrera
                                    FROM tb_matricula M
                                    INNER JOIN tb_carrera C ON M.idcarrera = C.idcarrera
                                    INNER JOIN tb_nivel N ON M.idnivel = N.idnivel
                                    WHERE M.idperiodo = :idperiodo
                                    AND M.idestudiante = :idestudiante");
          $prepare->execute($params);
    
          return $prepare->fetchAll(PDO::FETCH_CLASS, Resumen::class);
        }
    
        public static function findMaterias($params)
        {
          $db = new DB();
    
          $prepare = $db->prepare("SELECT M.idmateria, M.materia
                                  FROM tb_detalle_matricula_introductorio D
                                  INNER JOIN tb_matricula T ON D.idmatricula = T.idmatricula
                                  INNER JOIN tb_materia_introductorio M ON D.idmateria = M.idmateria
                                  WHERE T.idperiodo = :idperiodo
                                  AND D.idmatricula = :idmatricula
                                  ORDER BY M.materia");
          $prepare->execute($params);
    
          return $prepare->fetchAll(PDO::FETCH_CLASS, Resumen::class);
        }
    
        public static function findParcial($params)
        {
          $db = new DB();
    
          $prepare = $db->prepare("SELECT *
                                  FROM tb_calificacion_introductorio C
                                  WHERE C.idmatricula = :idmatricula
                                  AND C.idmateria = :idmateria
                                  AND C.idparcial = :idparcial");
          $prepare->execute($params);
    
          return $prepare->fetchAll(PDO::FETCH_CLASS, Resumen::class);
        }
    }

?>