<?php

    class Matriculadosporsexo extends DB
    {
        public function findSexoCarreraIdPeriodo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("call sp_estadisticasexo_matriculados_carrera(:idperiodo, :idcarrera);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Matriculadosporsexo::class);
        }

        public function findSexoValidacionIdPeriodo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("call sp_estadisticasexo_matriculados_validacion(:idperiodo, :idcarrera);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Matriculadosporsexo::class);
        }

        public function findSexoIntroductorioIdPeriodo($params)
        {
            $db = new DB();

            $prepare = $db->prepare("call sp_estadisticasexo_matriculados_introductorio(:idperiodo, :idcarrera);");
            $prepare->execute($params);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Matriculadosporsexo::class);
        }
    }