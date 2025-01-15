<?php

    class ActualizarfotoController
    {
        public function index()
        {
            $idestudiante = Main::decryption($_SESSION['idestudiante_appit']);

            $datos = Datospersonales::find($idestudiante);

            view('actualizarfoto.index', ["datos" => $datos]);
        }

        public function updatefoto()
        {
            $idestudiante = Main::limpiar_cadena($_POST['idestudiante']);
            $fotoactual = Main::limpiar_cadena($_POST['fotoactual']);

            $idestudiante = Main::decryption($idestudiante);

            $file           = $_FILES['foto']['name'];
            $path           = DOC;
            $newnamedoc     = strtotime("now")+1;
            $extension      = pathinfo($file, PATHINFO_EXTENSION);
            $foto           = $newnamedoc . '.' . $extension;
            
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $path . $foto)){
                if(file_exists(DIR.'files/'.$fotoactual)){
                    unlink(DIR.'files/'.$fotoactual);
                }
    
                $param = [":idestudiante" => $idestudiante, ":foto" => $foto];
                $res = Actualizarfoto::updateFoto($param);
            } else { 
                echo false;
            }

            echo json_encode($res);
        }
    }

?>