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

<body class="bg-gradient-primary">    
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="card col-xl-4 col-lg-12 col-md-9 my-5" style="box-shadow: 0 0 20px #273746; margin-top: 5em !important;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-2">         <?php //echo Main::encryption(''); ?>
                                <div class="text-center mb-2">
                                    <img src="img/appit_logo.png" width="25%">
                                    <img src="img/logo_eco_itsup.png" width="25%">
                                    <h5 class="text-gray-900 mb-2" style="font-family: 'Fredoka One', cursive;">Aplicación Integrada ITSUP</h5>
                                    <span>Módulo del Administrador</span>
                                </div>
                                <form id="form" method="post" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="usuario" name="usuario" placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="contrasena" name="contrasena" placeholder="Contraseña">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Iniciar Sesión</button>
                                    <hr>
                                </form>
                                <div class="text-center mb-2">
                                    <a class="small" href="#">Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- Alertas -->
        <div id="liveToast" class="toast text-white bg-danger border-0" style="position: absolute; top: 50px; right: 20px;">
            <div class="toast-body">

            </div>
        </div>
        <!-- End Alertas -->
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
    <script src="functions/global.js?v=1.0.0"></script>
    <script src="functions/login.js?v=1.0.5"></script>

</body>

</html>