<?php

    class Calificacionadmisiones extends DB
    {
        public static function ViewListaEstudiante($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT D.idadmisiones, CONCAT(A.apellido1,' ',A.apellido2,' ',A.nombre1,' ',A.nombre2)AS estudiante
                                    FROM tb_detalle_admision D
                                    INNER JOIN tb_admisiones A ON D.idadmisiones = A.idadmisiones
                                    WHERE D.idperiodo = :idperiodo
                                    ORDER BY A.apellido1, A.apellido2, A.nombre1, A.nombre2;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Calificacionadmisiones::class);
        }

        public static function FindCalificacionIdAdmisiones($params)
        {
            $db = new DB();

            $prepare = $db->prepare("SELECT * FROM tb_calificacion_admisiones
                                    WHERE idperiodo = :idperiodo
                                    AND idmodulo = :idmodulo
                                    AND idadmisiones = :idadmisiones;");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Calificacionadmisiones::class);
        }

        public static function Save($params)
        {
            $db = new DB();

            $prepare = $db->prepare("call sp_calificacion_admisiones_save(:idperiodo, :idmodulo, :idadmisiones, :parametro, :calificacion);");
            
            return $prepare->execute($params);            
        }
    }

?>