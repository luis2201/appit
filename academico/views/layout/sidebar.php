

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
                Estudiante & Asistencia
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#calificaciones" aria-expanded="true" aria-controls="calificaciones">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Asistencia</span>
                </a>
                <div id="calificaciones" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registro & Reportes</h6>
                        <a class="collapse-item" href="reporteasistencia">Reporte de Asistencia</a>
                    </div>
                </div>
            </li>
            <!-- Docentes y Materias -->
            <div class="sidebar-heading">
                Docentes & Materias
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cargahoraria" aria-expanded="true" aria-controls="cargahoraria">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Carga Horaria</span>
                </a>
                <div id="cargahoraria" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registro & Reportes</h6>
                        <a class="collapse-item" href="cargahoraria">Registro Carga Horaria</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#actividadesdocemte" aria-expanded="true" aria-controls="actividadesdocemte">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Actividades Docentes</span>
                </a>
                <div id="actividadesdocemte" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Leccionario</h6>
                        <a class="collapse-item" href="leccionario">Registro de Actividades</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tutor" aria-expanded="true" aria-controls="tutor">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Tutores</span>
                </a>
                <div id="tutor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registro & Reportes</h6>
                        <a class="collapse-item" href="tutor">Registro de Tutores</a>
                    </div>
                </div>
            </li>

            <!-- Módulo Introductorio -->
            <div class="sidebar-heading">
                Módulo introductorio
            </div>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#modulointroductorio" aria-expanded="true" aria-controls="modulointroductorio">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Materias</span>
                </a>
                <div id="modulointroductorio" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Perfil Introductorio</h6>
                        <a class="collapse-item" href="materiasintroductorio">Materias Introductorio</a>
                        <a class="collapse-item" href="materiasperfil">Enlazar materias Perfil</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#docenteintroductorio" aria-expanded="true" aria-controls="docenteintroductorio">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Docentes</span>
                </a>
                <div id="docenteintroductorio" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Perfil Introductorio</h6>
                        <a class="collapse-item" href="cargahorariaintroductorio">Carga Horaria</a>                        
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