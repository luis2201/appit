<?php

    class CatalogomateriaController
    {

        public function index()
        {
            $materias = Materia::findListaMateriaAll();

            view('catalogomateria.index', ["materias" => $materias]);
        }

        public function insertmateria()
        {
            $data = json_decode(file_get_contents('php://input'));

            $codigo = Main::limpiar_cadena($data->codigo);
            $materia = Main::limpiar_cadena($data->materia);
            $idconcatenada = Main::limpiar_cadena($data->idconcatenada);
            $creditos = Main::limpiar_cadena($data->creditos);

            $param = [":codigo" => $codigo, ":materia" => $materia, ":idconcatenada" => $idconcatenada, ":creditos" => $creditos];
            $resp = Materia::insertMateria($param);

            echo json_encode($resp);
        }

        public function insertconcatenada()
        {
            $data = json_decode(file_get_contents('php://input'));

            $idmateria = Main::limpiar_cadena($data->idmateria);
            $idconcatenada = Main::limpiar_cadena($data->idconcatenada);
            
            $idmateria = Main::decryption($idmateria);            
            $idconcatenada = Main::decryption($idconcatenada);            

            $param = [":idmateria" => $idmateria, ":idconcatenada" => $idconcatenada];
            $resp = Materia::insertConcatenada($param);

            echo json_encode($resp);
        }

    }