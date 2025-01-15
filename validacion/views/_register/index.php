<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB APPIT 1.0 | Aplicación Integrada ITSUP > Estudiante</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom JQueryConfirm CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <!-- Custom styles for site -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card col-lg-6 o-hidden border-0 shadow-lg my-1" style="margin: auto;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-2">
                            <div class="text-center">
                                <img src="img/logo_itsup_2022_redondo.png" width="150px">
                                <h4 class="text-gray-900 mb-4"><strong>Registro de cuenta de usuario</strong></h4>
                            </div>
                            <hr>
                            <form id="form" class="user">
                                <div class="form-group">
                                    <label for="tipo_identificacion">Documento de identificación</label>
                                    <select class="form-control" id="tipo_identificacion" name="tipo_identificacion">
                                        <option value="">-- Seleccione tipo de documento --</option>
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="numero_identificacion">Número de Identificación</label>
                                    <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="apellido1">Primer Apellido</label>
                                        <input type="text" class="form-control text-uppercase" id="apellido1" name="apellido1">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="apellido2">Segundo Apellido</label>
                                        <input type="text" class="form-control text-uppercase" id="apellido2" name="apellido2"">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="nombre1">Primer Nombre</label>
                                        <input type="text" class="form-control text-uppercase" id="nombre1" name="nombre1">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="nombre2">Segundo Nombre</label>
                                        <input type="text" class="form-control text-uppercase" id="nombre2" name="nombre2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correo_electronico">Correo Elelctrónico</label>
                                    <input type="text" class="form-control text-lowercase" id="correo_electronico" name="correo_electronico" placeholder="Correo electrónico">
                                </div>
                                <button type="submit" value="Send Email" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Olvidaste tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Ya tienes una cuenta? Inicia sesión!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alertas -->
        <div id="liveToast" class="toast text-white bg-danger border-0"
            style="position: absolute; top: 50px; right: 20px;">
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

    <script src="https://smtpjs.com/v3/smtp.js"></script>

    <!-- Custom script JQueryConfirm -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- CDN Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>

    <!-- Custom scripts for site -->
    <script src="functions/register.js"></script>

</body>

</html>