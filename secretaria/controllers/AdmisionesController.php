<?php

    class AdmisionesController
    {
        public function index()
        {
            $paises = Pais::findAll();
            $ciudades = Ciudad::findAll();
            view("admisiones.index", ["paises" => $paises, "ciudades" => $ciudades]);
        }

        public function findcedula($numero_identificacion)
        {
            $numero_identificacion = Main::limpiar_cadena($numero_identificacion);

            $res = Admisiones::findcedula($numero_identificacion);

            echo json_encode($res);
        }

        public function inconsistenciadatos($numero_identificacion)
        {
          $numero_identificacion = Main::limpiar_cadena($numero_identificacion);
    
          $res = Admisiones::inconsistenciaDatos($numero_identificacion);
    
          echo json_encode($res);
        }

        public function rechazaradmisiones($iddetalle_admision)
        {
            $iddetalle_admision = Main::limpiar_cadena($iddetalle_admision);

            $res = Admisiones::rechazarAdmisiones($iddetalle_admision);

            echo json_encode($res);
        }

        public function aprobaradmisiones($iddetalle_admision)
        {
            $iddetalle_admision = Main::limpiar_cadena($iddetalle_admision);

            $res = Admisiones::aprobarAdmisiones($iddetalle_admision);

            echo json_encode($res);
        }
    }

?>