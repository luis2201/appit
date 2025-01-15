<?php 
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>APPIT 1.0 | Aplicación Integrada ITSUP > Estudiante</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Fredoka+One&display=swap" rel="stylesheet">

        <!-- Custom JQueryConfirm CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    </head>
    <body>
        <?php 
            
            require_once 'models/Main.php';
            
            $numero_identificacion = explode('/', $_SERVER['REQUEST_URI']);
            $params = ["idperiodo" => 12, ":numero_identificacion" => Main::decryption($numero_identificacion[3])];
            $resp = Certificadomatricula::findIdEstudiante($params);

            foreach($resp as $row):
                $idmatricula = $row->idmatricula;
                        
        ?>

        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width:90pt;">


                <p id="fechaactual" class="text-end mt-5" style="font-size:12">FECHA ACTUAL</p>
                
                <p class="text-center mt-5">
                Ab. Roberth Alejandro Zambrano Ubillús <br>
                <strong>SECRETARIA GENERAL</strong>
                </p>
                
                <p class="mt-3">Avm</p> 
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Custom script JQueryConfirm -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

        <!-- CDN Axios -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

        <!-- Custom script for sites -->
        <!-- <script src="functions/reportepdf.js"></script> -->

        <script>
            const hoy = new Intl.DateTimeFormat("es-ES", { dateStyle: "long" }).format(new Date());
            document.getElementById("fechaactual").innerHTML = "Portoviejo, " + hoy;
        </script>

        <style>
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
    </body>

</html>

<?php
    $html = ob_get_clean();
    //echo $html;

    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4','');

    $dompdf->render();

    $dompdf->stream("record_academico.pdf", array("Attachment" => false));

?> 