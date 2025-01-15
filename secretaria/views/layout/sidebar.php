

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
                Admisiones & Listas
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="docenteadmisiones" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Docentes</span>
                </a>
                <a class="nav-link collapsed" href="admisiones" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Solicitud</span>
                </a>            
                <a class="nav-link collapsed" href="listasadmisiones" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Listas</span>
                </a>
            </li>  
            <!-- End Matrículas y Listas -->

            <!-- Matrícula y Listas -->
            <div class="sidebar-heading">
                Matrícula & Listas
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#matricula" aria-expanded="true" aria-controls="matricula" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Matrícula</span>
                </a>
                <div id="matricula" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de matrícula:</h6>
                        <a class="collapse-item" href="solicitudmatricula">Solicitudes</a>                        
                        <a class="collapse-item" href="matriculasnovalidadas">Sin validar</a>                        
                        <a class="collapse-item" href="datosincompletos">Datos Incompletos</a>
                        <a class="collapse-item" href="registromatricula">Matricular</a>
                        <a class="collapse-item" href="certificadomatricula">Certificado Matrícula</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listas" aria-expanded="true" aria-controls="listas" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Listas</span>
                </a>
                <div id="listas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Niveles y Carreras:</h6>
                        <a class="collapse-item" href="listasniveles">Listas por Niveles y Carreras</a>
                    </div>
                </div>                
            </li>  
            <!-- End Matrículas y Listas -->
            
            <!-- Validaciones y Listas -->
            <div class="sidebar-heading">
                Validación & Listas
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#validacion" aria-expanded="true" aria-controls="validacion" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Validación</span>
                </a>
                <div id="validacion" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de matrícula:</h6>
                        <a class="collapse-item" href="solicitudvalidacion">Solicitudes</a>  
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listasvalidacion" aria-expanded="true" aria-controls="listas" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Listas</span>
                </a>
                <div id="listasvalidacion" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Niveles y Carreras:</h6>
                        <a class="collapse-item" href="listasvalidacion">Listas por Niveles y Carreras</a>
                    </div>
                </div>                
            </li> 
            <!-- End Matrículas y Listas -->

            <!-- Estudiantes -->
            <div class="sidebar-heading">
                Estudiantes & Documentos
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#perfil" aria-expanded="true" aria-controls="perfil" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Promoción</span>
                </a>
                <div id="perfil" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de promoción:</h6>
                        <a class="collapse-item" href="promocion">Certificados de Promoción</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#documentos" aria-expanded="true" aria-controls="documentos" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Documentos</span>
                </a>
                <div id="documentos" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de datos:</h6>
                        <a class="collapse-item" href="documentosestudiante">Ver Documentos</a>
                    </div>
                </div>
            </li>  
            <!-- End Matrículas y Listas -->

            <!-- Docentes -->
            <div class="sidebar-heading">
                Docentes & Materias
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#docentes" aria-expanded="true" aria-controls="docentes" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Docentes</span>
                </a>
                <div id="docentes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Datos Docentes:</h6>
                        <a class="collapse-item" href="registrodocente">Registro de Docentes</a>
                        <a class="collapse-item" href="cargahoraria">Carga Horaria</a>
                        <a class="collapse-item" href="tutor">Tutores</a>
                    </div>
                </div>
            </li>
            <!-- End Matrículas y Listas -->

            <!-- Mallas y Materias -->
            <div class="sidebar-heading">
                Malla & Materias
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#materias" aria-expanded="true" aria-controls="materias" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Materias</span>
                </a>
                <div id="materias" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Información Materias:</h6>
                        <a class="collapse-item" href="materias">Lista de Materias</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#malla" aria-expanded="true" aria-controls="malla" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Mallas</span>
                </a>
                <div id="malla" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Malla Curricular:</h6>
                        <a class="collapse-item" href="malla">Registro de Malla Curricular</a>
                    </div>
                </div>
            </li>
            <!-- End Mallas y Materias -->

            <!-- Calificaciones -->
            <div class="sidebar-heading">
                Reportes & Calificaciones
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportes" aria-expanded="true" aria-controls="reportes" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Reportes</span>
                </a>
                <div id="reportes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reportes de Calificaciones:</h6>
                        <a class="collapse-item" href="cuadrogeneral">Cuadro General</a>
                        <a class="collapse-item" href="cuadrodocente">Cuadro por Docente</a>
                        <a class="collapse-item" href="perfilestudiante">Perfil del Estudiante</a>
                        <a class="collapse-item" href="record">Record Académico</a>
                        <a class="collapse-item" href="recordenlinea">Record Académico En Línea</a>
                        <a class="collapse-item" href="recordvalidacion">Record Académico Validación</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#calificaciones" aria-expanded="true" aria-controls="calificaciones" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Calificaciones</span>
                </a>
                <div id="calificaciones" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administración:</h6>
                        <a class="collapse-item" href="ingresocalificacion">Ingreso/Actualización</a>                        
                        <a class="collapse-item" href="ingresocalificaciontotal">Ingreso por Periodo</a>                        
                        <a class="collapse-item" href="enlineacalificaciontotal">Ingreso en Línea</a>                        
                    </div>
                </div>
            </li>
            <!-- End Calificaciones -->

            <!-- Estadísticas -->
            <div class="sidebar-heading">
                Estadísticas
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#estadisticas" aria-expanded="true" aria-controls="estadisticas" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Matriculados</span>
                </a>
                <div id="estadisticas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Matriculados por Sexo:</h6>
                        <a class="collapse-item" href="matriculadosporsexo">Carreras</a>
                        <a class="collapse-item" href="matriculadosporsexovalidacion">Validación</a>
                        <a class="collapse-item" href="matriculadosporsexointroductorio">Introductorio</a>
                    </div>
                </div>
            </li>
            <!-- End Configuración y Sistemas -->

            <!-- Configuración y Sistemas -->
            <div class="sidebar-heading">
                Configuración & Sistema
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#configuracion" aria-expanded="true" aria-controls="configuracion" style="padding: 0.5em 1em;">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Configuración</span>
                </a>
                <div id="configuracion" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de Configuración:</h6>
                        <a class="collapse-item" href="configuracioncalificaciones">Calificaciones</a>
                        <a class="collapse-item" href="configuracionperiodo">Periodo Lectivo</a>
                    </div>
                </div>
            </li>
            <!-- End Configuración y Sistemas -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">