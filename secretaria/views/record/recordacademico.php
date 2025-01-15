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
        $numero_identificacion = explode('/', $_SERVER['REQUEST_URI']);
        echo $numero_identificacion[3];
        // $params = ["idperiodo" => 12, ":numero_identificacion" => Main::decryption($numero_identificacion[3])];
        // $resp = Certificadomatricula::findIdEstudiante($params);

        // foreach($resp as $row):
        //     $idmatricula = $row->idmatricula;
    ?>

    <div style="clear:both; position:relative;">

            <p id="fechaactual" align="right" style="font-size:12; margin-bottom:20px;">
                <?php 
                    $fecha_actual = date("d-m-Y h:i:s");
                    $fechaComoEntero = strtotime($fecha_actual);
                    $anio = date("Y", $fechaComoEntero);
                    $mes = date("m", $fechaComoEntero);
                    $dia = date("d", $fechaComoEntero);

                    switch($mes)
                    {   
                        case 01:
                            $mes = "Enero";
                            break;

                        case 02:
                            $mes = "Febrero";
                            break;

                        case 03:
                            $mes = "Marzo";
                            break;

                        case 04:
                            $mes = "Abril";
                            break;

                        case 05:
                            $mes = "Mayo";
                            break;

                        case 06:
                            $mes = "Junio";
                            break;

                        case 07:
                            $mes = "Julio";
                            break;

                        case 08:
                            $mes = "Agosto";
                            break;

                        case 09:
                            $mes = "Septiembre";
                            break;

                        case 10:
                            $mes = "Octubre";
                            break;

                        case 11:
                            $mes = "Noviembre";
                            break;

                        case 12:
                            $mes = "Diciembre";
                            break;
                    }
                ?>
                Portoviejo, <?php echo $dia ?> de <?php echo $mes ?> de <?php echo $anio ?>
            </p>
            <br><br><br>
            <p align="center">
            Ab. Alejandro Zambrano Ubillús <br>
            <strong>SECRETARÍA GENERAL</strong>
            </p>
            <br><br>
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

    $dompdf->stream("certificado_matricula.pdf", array("Attachment" => false));

?> 