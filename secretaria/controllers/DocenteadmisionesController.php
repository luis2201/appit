<?php

    class DocenteadmisionesController
    {
        public function index()
        {
            $docentes = Docente::findAll();
            $modulos = Modulo::findAll();
            
            $resp = Periodo::findAll();
            foreach($resp as $row){
                $idperiodo = $row->idperiodo;
            }

            $params = [":idperiodo" => $idperiodo];
            $docentemodulos = Docenteadmisiones::findAll($params);

            view("docenteadmisiones.index", ["docentes" => $docentes, "modulos" => $modulos, "docentemodulos" => $docentemodulos]);
        }
        
        public function valida()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idmodulo  = Main::limpiar_cadena($data->idmodulo) ;
            
            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idmodulo = Main::decryption($idmodulo);

            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idmodulo" => $idmodulo];
            $resp = Docenteadmisiones::Valida($params);

            echo json_encode($resp);
        }
    
        public function insert()
        {
            $data = json_decode(file_get_contents("php://input"));

            $idperiodo = Main::limpiar_cadena($data->idperiodo);
            $iddocente = Main::limpiar_cadena($data->iddocente);
            $idmodulo  = Main::limpiar_cadena($data->idmodulo) ;
            
            $idperiodo = Main::decryption($idperiodo);
            $iddocente = Main::decryption($iddocente);
            $idmodulo = Main::decryption($idmodulo);

            $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente, ":idmodulo" => $idmodulo];
            $resp = Docenteadmisiones::Insert($params);

            echo json_encode($resp);
        }

        public function delete($idmodulo_docente)
        {            
            $idmodulo_docente = Main::limpiar_cadena($idmodulo_docente);
                                
            $idmodulo_docente = Main::decryption($idmodulo_docente);

            $params = [":idmodulo_docente" => $idmodulo_docente];
            $resp = Docenteadmisiones::Delete($params);

            echo json_encode($resp);
        }
    }

?>