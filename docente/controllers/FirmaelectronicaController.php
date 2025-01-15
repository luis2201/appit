<?php 

    class FirmaelectronicaController
    {
        public function index()
        {
            $firmas = Firmaelectronica::findIdDocente([":iddocente" => $_SESSION['idusuario_appit']]);

            view("firmaelectronica.index", ["firmas" => $firmas]);
        }

        public function register()
        {
            $iddocente = Main::limpiar_cadena($_SESSION['idusuario_appit']);
            $pas_firma = Main::limpiar_cadena($_POST['contrasena']);
            $pas_firma = Main::encryption($pas_firma);
            
            $file           = $_FILES['doc_firma']['name'];
            $path           = DOCFIRMA;
            $newnamedoc     = strtotime("now");
            $extension      = pathinfo($file, PATHINFO_EXTENSION);
            $doc_firma      = $newnamedoc . '.' . $extension;      
            
            $move = move_uploaded_file($_FILES['doc_firma']['tmp_name'], $path . $doc_firma);
            if($move){
                $param = [":iddocente" => $iddocente, ":doc_firma" => $doc_firma, ":pas_firma" => $pas_firma];
                $resp = Firmaelectronica::register($param); 
            } else{
                unlink($path . $doc_firma);
                $move = false;
            }

            echo json_encode($move);
        }

        public function findfirmaiddocente()
        {
            $iddocente = Main::limpiar_cadena($_SESSION['idusuario_appit']);

            $param = [":iddocente" => $iddocente];
            $resp = Firmaelectronica::findIdDocente($param);

            echo json_encode($resp);
        }

        public function validatepasfirma()
        {
            $data = json_decode(file_get_contents('php://input'));

            $iddocente = Main::limpiar_cadena($_SESSION['idusuario_appit']);
            $pas_firma = Main::limpiar_cadena($data->pas_firma);
            $pas_firma = Main::encryption($pas_firma);

            $param = [":iddocente" => $iddocente, ":pas_firma" => $pas_firma];
            $resp = Firmaelectronica::validatePassFirma($param);

            echo json_encode(count($resp));
        }
    }