

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo DIR; ?>img/appit_logo.png" style="width: 4em;">
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

            <!-- Estudiantes y Asistencias -->
            <div class="sidebar-heading">
                Inscriciones
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#modulos" aria-expanded="true" aria-controls="calificaciones">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Módulos</span>
                </a>
                <div id="modulos" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Inscripciones & Reportes</h6>
                        <a class="collapse-item" href="validar">Validar inscripciones</a>
                        <a class="collapse-item" href="listainscritos">Lista de inscritos</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#examensuficiencia" aria-expanded="true" aria-controls="calificaciones">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Examen de Suficiencia</span>
                </a>
                <div id="examensuficiencia" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Inscripciones & Reportes</h6>
                        <a class="collapse-item" href="examensuficiencia">Inscribir</a>
                        <a class="collapse-item" href="certificadosuficiencia">Certificados</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ubicacion" aria-expanded="true" aria-controls="calificaciones">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Calificaciones</span>
                </a>
                <div id="ubicacion" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registro & Reportes</h6>
                        <a class="collapse-item" href="registrocalificacion">Calificaciones Módulos</a>
                        <a class="collapse-item" href="calificacionsuficiencia">Calificaciones Suficiencia</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportes" aria-expanded="true" aria-controls="calificaciones">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Reportes</span>
                </a>
                <div id="reportes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registro & Reportes</h6>
                        <a class="collapse-item" href="reportecalificacion">Calificaciones</a>
                    </div>
                </div>
            </li>

            <!-- Configuración y Sistemas -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">