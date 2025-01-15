

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

            <!-- Matrícula y Listas -->
            <div class="sidebar-heading">
                Estudiantes & Matrícula
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#estudiante" aria-expanded="true" aria-controls="estudiante" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Estudiantes</span>
                </a>
                <div id="estudiante" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Datos y tipo:</h6>
                        <a class="collapse-item" href="cambiotipoestudiante">Cambiar tipo</a>
                        <a class="collapse-item" href="cedulacorreoestudiante">Cambiar cédula-correo</a>
                        <a class="collapse-item" href="estudiantemateria">Agregar/Eliminar materia</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#materias" aria-expanded="true" aria-controls="materias" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Materias</span>
                </a>
                <div id="materias" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Materias:</h6>
                        <a class="collapse-item" href="catalogomateria">Catálogo de Materias</a>
                        <a class="collapse-item" href="mallaacademica">Malla Académica</a>
                        <a class="collapse-item" href="agregarestudiantemateria">Estudiante a Materia</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#matricula" aria-expanded="true" aria-controls="matricula" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Matrícula</span>
                </a>
                <div id="matricula" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Niveles y Carreras:</h6>
                        <a class="collapse-item" href="listasniveles">Listas por Niveles y Carreras</a>
                    </div>
                </div>                
            </li>
            <!-- End Matrículas y Listas --> 

            <!-- Matrícula y Listas -->
            <div class="sidebar-heading">
                Docentes & Calificaciones
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#docentes" aria-expanded="true" aria-controls="docentes" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Docentes</span>
                </a>
                <div id="docentes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Datos y seguridad:</h6>
                        <a class="collapse-item" href="contrasenadocente">Reset contraseña</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listas" aria-expanded="true" aria-controls="listas" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Calificaciones</span>
                </a>
                <div id="listas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Niveles y Carreras:</h6>
                        <a class="collapse-item" href="listasniveles">Listas por Niveles y Carreras</a>
                    </div>
                </div>                
            </li>
            <!-- End Matrículas y Listas --> 

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">