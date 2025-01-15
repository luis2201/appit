<?php

    class Estudiantes extends DB
    {
        public function Insert($params)
        {
            $db = new DB();

            $prepare = $db->prepare("INSERT INTO tb_estudiante(tipo_identificacion, numero_identificacion, fecha_nacimiento, apellido1, apellido2, nombre1, nombre2, sexo, 
                                    genero, estado_civil, etnia, tipo_sangre, discapacidad, porcentaje_discapacidad, carnet_conadis, numero_carnet, tipo_discapacidad, 
                                    idpais_nacionalidad, idcanton_nacimiento, idpais_residencia, idcanton_residencia, correo_electronico, numero_celular, tipo_colegio, 
                                    ocupacion, ingresos, bono_desarrollo, nivel_formacionp, nivel_formacionm, ingresos_hogar, miembros_hogar, doc_cedula, doc_titulo, foto)
                                    VALUES(:tipo_identificacion, :numero_identificacion, :fecha_nacimiento, :apellido1, :apellido2, :nombre1, :nombre2, :sexo, 
                                    :genero, :estado_civil, :etnia, :tipo_sangre, :discapacidad, :porcentaje_discapacidad, :carnet_conadis, :numero_carnet, 
                                    :tipo_discapacidad, :idpais_nacionalidad, :idcanton_nacimiento, :idpais_residencia, :idcanton_residencia, :correo_electronico, 
                                    :numero_celular, :tipo_colegio, :ocupacion, :ingresos, :bono_desarrollo, :nivel_formacionp, :nivel_formacionm, :ingresos_hogar, 
                                    :miembros_hogar, :doc_cedula, :doc_titulo, :foto)");
            
            return $prepare->execute($params);       
        }
    }

?>