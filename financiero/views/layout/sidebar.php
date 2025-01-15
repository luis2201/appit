

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo DIR; ?>img/appit_logo.png" style="width: 3.5em;">
                </div>
                <div class="sidebar-brand-text mx-3">ver. 1.0</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
    
            <!-- Matrículas y cuotas -->
            <div class="sidebar-heading">
                Matrícula & Cuotas
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagos" aria-expanded="true" aria-controls="collapsePagos">
                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Pago de Matrícula</span>
                </a>
                <div id="collapsePagos" class="collapse" aria-labelledby="headingPagos" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="listapagomatricula">Pagos recibidos</a>
                        <a class="collapse-item" href="pagomatricula">Registro de pago</a>
                    </div>
                </div>
            </li>

             <!-- Admi -->
             <div class="sidebar-heading">
                Admisiones
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmisiones" aria-expanded="true" aria-controls="collapseAdmisiones">
                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Pago de Inscripción</span>
                </a>
                <div id="collapseAdmisiones" class="collapse" aria-labelledby="headingAdmisiones" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="listapagoadmisiones">Pagos recibidos</a>
                        <a class="collapse-item" href="pagoadmisiones">Registro de pago</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Reportes
            </div> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Matrícula</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de matrícula:</h6>
                        <a class="collapse-item" href="datosmatriculados">Datos Estudiantes</a>
                    </div>
                </div>
            </li> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">