<?php

    class EstudiantesController
    {
        public function index()
        {
            $paises = Pais::findAll();
            $ciudades = Ciudad::findAll();

            view('estudiantes.index', ["paises" => $paises, "ciudades" => $ciudades]);
        }

        public function insert()
        {
            $tipo_identificacion     = main::limpiar_cadena($_POST['tipo_identificacion']);
            $numero_identificacion   = main::limpiar_cadena($_POST['numero_identificacion']);
            $fecha_nacimiento        = main::limpiar_cadena($_POST['fecha_nacimiento']);
            $apellido1               = main::limpiar_cadena($_POST['apellido1']);
            $apellido2               = main::limpiar_cadena($_POST['apellido2']);
            $nombre1                 = main::limpiar_cadena($_POST['nombre1']);
            $nombre2                 = main::limpiar_cadena($_POST['nombre2']);
            $sexo                    = main::limpiar_cadena($_POST['sexo']);
            $genero                  = main::limpiar_cadena($_POST['genero']);
            $estado_civil            = main::limpiar_cadena($_POST['estado_civil']);
            $etnia                   = main::limpiar_cadena($_POST['etnia']);
            $tipo_sangre             = main::limpiar_cadena($_POST['tipo_sangre']);
            $discapacidad            = main::limpiar_cadena($_POST['discapacidad']);
            $porcentaje_discapacidad = main::limpiar_cadena($_POST['porcentaje_discapacidad']);
            $carnet_conadis          = main::limpiar_cadena($_POST['carnet_conadis']);
            $numero_carnet           = main::limpiar_cadena($_POST['numero_carnet']);
            $tipo_discapacidad       = main::limpiar_cadena($_POST['tipo_discapacidad']);
            $idpais_nacionalidad     = main::limpiar_cadena($_POST['idpais_nacionalidad']);
            $idcanton_nacimiento     = main::limpiar_cadena($_POST['idcanton_nacimiento']);
            $idpais_residencia       = main::limpiar_cadena($_POST['idpais_residencia']);
            $idcanton_residencia     = main::limpiar_cadena($_POST['idcanton_residencia']);
            $correo_electronico      = main::limpiar_cadena($_POST['correo_electronico']);
            $numero_celular          = main::limpiar_cadena($_POST['numero_celular']);
            $tipo_colegio            = main::limpiar_cadena($_POST['tipo_colegio']);
            $ocupacion               = main::limpiar_cadena($_POST['ocupacion']);
            $ingresos                = main::limpiar_cadena($_POST['ingresos']);
            $bono_desarrollo         = main::limpiar_cadena($_POST['bono_desarrollo']);
            $nivel_formacionp        = main::limpiar_cadena($_POST['nivel_formacionp']);
            $nivel_formacionm        = main::limpiar_cadena($_POST['nivel_formacionm']);
            $ingresos_hogar          = main::limpiar_cadena($_POST['ingresos_hogar']);
            $miembros_hogar          = main::limpiar_cadena($_POST['miembros_hogar']);
            
            if($_FILES['doc_cedula']['name'] != ''){
                $file           = $_FILES['doc_cedula']['name'];            
                $path           = DOC;
                $newnamedoc     = strtotime("now");
                $extension      = pathinfo($file, PATHINFO_EXTENSION);
                $doc_cedula     = $newnamedoc . '.' . $extension;      
                move_uploaded_file($_FILES['doc_cedula']['tmp_name'], $path . $doc_cedula);
            } else{
                $doc_cedula = '';
            }

            if($_FILES['doc_titulo']['name'] != ''){
                $file           = $_FILES['doc_titulo']['name'];
                $path           = DOC;
                $newnamedoc     = strtotime("now")+1;
                $extension      = pathinfo($file, PATHINFO_EXTENSION);
                $doc_titulo     = $newnamedoc . '.' . $extension;
                move_uploaded_file($_FILES['doc_titulo']['tmp_name'], $path . $doc_titulo);
            } else{
                $doc_titulo = '';
            }

            if($_FILES['foto']['name'] != ''){
                $file           = $_FILES['foto']['name'];
                $path           = DOC;
                $newnamedoc     = strtotime("now")+1;
                $extension      = pathinfo($file, PATHINFO_EXTENSION);
                $foto           = $newnamedoc . '.' . $extension;
                move_uploaded_file($_FILES['foto']['tmp_name'], $path . $foto);
            } else{
                $foto = '';
            }
            
            $params = [
                ":tipo_identificacion"      => $tipo_identificacion,
                ":numero_identificacion"    => $numero_identificacion,
                ":fecha_nacimiento"         => ($fecha_nacimiento=='') ? null : $fecha_nacimiento,
                ":apellido1"                => ($apellido1 == '') ? null : $apellido1,
                ":apellido2"                => ($apellido2 == '') ? null : $apellido2,
                ":nombre1"                  => ($nombre1 == '') ? null : $nombre1,
                ":nombre2"                  => ($nombre2 == '') ? null : $nombre2,
                ":sexo"                     => ($sexo == '') ? null : $sexo,
                ":genero"                   => ($genero == '') ? null : $genero,
                ":estado_civil"             => ($estado_civil == '') ? null : $estado_civil,
                ":etnia"                    => ($etnia == '') ? null : $etnia,
                ":tipo_sangre"              => ($tipo_sangre == '') ? null : $tipo_sangre,
                ":discapacidad"             => ($discapacidad == '') ? null : $discapacidad,
                ":porcentaje_discapacidad"  => ($porcentaje_discapacidad == '') ? null : $porcentaje_discapacidad,
                ":carnet_conadis"           => ($carnet_conadis == '') ? null : $carnet_conadis,
                ":numero_carnet"            => ($numero_carnet == '') ? null : $numero_carnet,
                ":tipo_discapacidad"        => ($tipo_discapacidad == '') ? null : $tipo_discapacidad,
                ":idpais_nacionalidad"      => ($idpais_nacionalidad == '') ? null : $idpais_nacionalidad,
                ":idcanton_nacimiento"      => ($idcanton_nacimiento == '') ? null : $idcanton_nacimiento,
                ":idpais_residencia"        => ($idpais_residencia == '') ? null : $idpais_residencia,
                ":idcanton_residencia"      => ($idcanton_residencia == '') ? null : $idcanton_residencia,
                ":correo_electronico"       => ($correo_electronico == '') ? null : $correo_electronico,
                ":numero_celular"           => ($numero_celular == '') ? null : $numero_celular,
                ":tipo_colegio"             => ($tipo_colegio == '') ? null : $tipo_colegio,
                ":ocupacion"                => ($ocupacion == '') ? null : $ocupacion,
                ":ingresos"                 => ($ingresos == '') ? null : $ingresos,
                ":bono_desarrollo"          => ($bono_desarrollo == '') ? null : $bono_desarrollo,
                ":nivel_formacionp"         => ($nivel_formacionp == '') ? null : $nivel_formacionp,
                ":nivel_formacionm"         => ($nivel_formacionm == '') ? null : $nivel_formacionm,
                ":ingresos_hogar"           => ($ingresos_hogar == '') ? null : $ingresos_hogar,
                ":miembros_hogar"           => ($miembros_hogar == '') ? null : $miembros_hogar,
                ":doc_cedula"               => ($doc_cedula == '') ? null : $doc_cedula,                
                ":doc_titulo"               => ($doc_titulo == '') ? null : $doc_titulo,                
                ":foto"                     => ($foto == '') ? null : $foto
            ];

            $resp = Estudiantes::Insert($params);
            
            echo json_encode($resp);
        }
    }

?>