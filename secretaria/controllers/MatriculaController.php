<?php

  class MatriculaController
  {

   public function index()
   {    
    $url= explode("?",$_SERVER["REQUEST_URI"]);    
    $idmatricula = Main::decryption($url[1]);

    $datosmatricula = Matricula::findmatricula($idmatricula);
    $detallematricula = Matricula::finddetallematricula($idmatricula);

    view('matricula.index', ["datosmatricula" => $datosmatricula, "detallematricula" => $detallematricula]);
   }

   public function cambioestado($iddetalle_matricula)
   {
    $iddetalle_matricula = Main::limpiar_cadena($iddetalle_matricula);
    $iddetalle_matricula = Main::decryption($iddetalle_matricula);

    $result = Matricula::cambioestado($iddetalle_matricula);

    echo json_encode($result);
   }

   public function apruebamatricula($idmatricula)
   {
    $idmatricula = Main::limpiar_cadena($idmatricula);

    $result = Matricula::apruebamatricula($idmatricula);

    echo json_encode($result);
   }

   public function estadomatricula($idmatricula)
   {
    $idmatricula = Main::limpiar_cadena($idmatricula);

    $result = Matricula::estadomatricula($idmatricula);

    echo json_encode($result);
   }

   public function validapendiente($idmatricula)
   {
    $idmatricula = Main::limpiar_cadena($idmatricula);

    $result = Matricula::validapendiente($idmatricula);

    echo json_encode($result);
   }

   public function eliminamateria($iddetalle_matricula)
   {
    $iddetalle_matricula = Main::limpiar_cadena($iddetalle_matricula);
    $iddetalle_matricula = Main::decryption($iddetalle_matricula);

    $result = Matricula::eliminamateria($iddetalle_matricula);

    echo json_encode($result);
   }

 }

?>