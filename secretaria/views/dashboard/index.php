<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Matrículas Aprobadas -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Matriculados
                            </div>
                            <div id="nummatriculados" class="h5 mb-0 font-weight-bold text-gray-800 text text-success">
                                <a href="listasniveles" class="text-primary" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo];
                                        $res = Dashboard::matriculados($param); 
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Matrículas por aprobar -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Matrículas por Aprobar
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-warning">
                                <a href="solicitudmatricula" class="text-warning" style="text-decoration: none">
                                    <?php 
                                        $res = Dashboard::matriculasPorAprobar($idperiodo); 
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Matrículados por carreraras -->

        <!-- Tecnología Superior Universitaria en Desarrollo de Software -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior Universitaria en Desarrollo de Software
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 49];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tecnología Superior en Desarrollo de Software -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior en Desarrollo de Software
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 15];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tecnología Superior en Electrónica -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior en Electrónica
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 35];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tecnología Superior en Secretariado Ejecutivo -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior en Secretariado Ejecutivo
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 6];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Técnico Superior en Enfermería -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Técnico Superior en Enfermería
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 4];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tecnología Superior en Emergencias Médicas (Ajuste Curricular) -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior en Emergencias Médicas
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 37];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Tecnología Superior Universitaria en Educación Inclusiva -->
         <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior Universitaria en Educación Inclusiva
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 41];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tecnología Superior Universitaria en Rehabilitación Física (Nuevo Ajuste) -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior Universitaria en Rehabilitación Física
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 38];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tecnología Superior en Turismo -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior en Turismo
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 9];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tecnología Superior Universitaria en Administración de Sistema de Salud -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior Universitaria en Administración de Sistema de Salud
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 48];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tecnología Superior Universitaria en Electrónica -->
        <div class="col-xl-3 col-md-6 mb-1">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tecnología Superior Universitaria en Electrónica
                            </div>
                            <div id="nummpormatricular" class="h5 mb-0 font-weight-bold text-gray-800 text-danger">
                                <a href="solicitudmatricula" class="text-danger" style="text-decoration: none">
                                    <?php 
                                        $param = [":idperiodo" => $idperiodo, ":idcarrera" => 50];
                                        $res = Dashboard::matriculadosCarrera($param);                                
                                        echo count($res);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logo -->
    <div class="col-12 text-center">
        <img src="<?php DIR; ?>img/logo_itsup_2022_redondo.png" alt="appit-itsup" style="width: 15%;">
        <img src="<?php DIR; ?>img/logo_eco_itsup.png" alt="appit-itsup" style="width: 12%;">
    </div>

</div>
<!-- End of Main Content -->

<?php include_once './views/layout/footer.php'; ?>
<script src="<?php echo DIR; ?>functions/index.js"></script>
</body>

</html>