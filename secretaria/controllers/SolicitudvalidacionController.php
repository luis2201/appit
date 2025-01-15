<?php

    class SolicitudvalidacionController
    {
        public function index()
        {
            $paises = Pais::findAll();
            $ciudades = Ciudad::findAll();
            view("solicitudvalidacion.index", ["paises" => $paises, "ciudades" => $ciudades]);
        }

        public function findall($idperiodo)
    {
      $idperiodo = Main::limpiar_cadena($idperiodo);
      $idperiodo = Main::decryption($idperiodo);

      $res = Solicitudmatricula::findall($idperiodo);

      echo json_encode($res);
    }

    public function findcedula($numero_identificacion)
    {
      $numero_identificacion = Main::limpiar_cadena($numero_identificacion);

      $res = Solicitudmatricula::findcedula($numero_identificacion);

      echo json_encode($res);
    }

    public function test()
    {
      view('solicitudmatricula.test', []);
    }

    public function inconsistenciadatos($numero_identificacion)
    {
      $numero_identificacion = Main::limpiar_cadena($numero_identificacion);

      $res = Solicitudmatricula::inconsistenciaDatos($numero_identificacion);

      echo json_encode($res);
    }

    public function rechazarmatricula($idmatricula)
    {
      $idmatricula = Main::limpiar_cadena($idmatricula);

      $res = Solicitudmatricula::rechazarMatricula($idmatricula);

      echo json_encode($res);
    }

  }

?>