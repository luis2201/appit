<?php

    class SyllabuspdfController
    {
        public function index()
        {
            $firmas = Firmaelectronica::findIdDocente([":iddocente" => $_SESSION['idusuario_appit']]);

            view("syllabuspdf.index", ["firmas" => $firmas]);
        }
    }

?>