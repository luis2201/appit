

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
                Mis Datos
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#matricula" aria-expanded="true" aria-controls="matricula">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Datos</span>
                </a>
                <div id="matricula" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Datos del Docente:</h6>
                        <a class="collapse-item" href="actualizardatos:;">Actualizar Datos</a>
                    </div>
                </div>
            </li>  
            <!-- End Matrículas y Listas -->

            <!-- Docentes y Materias -->
            <div class="sidebar-heading">
                Calificaciones & Reportes
            </div>
            
            <?php
                $params = [":iddocente" => $_SESSION['idusuario_appit']];            
                $admisiones = Docente::validaAdmisiones($params);

                if(count($admisiones)){
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admisiones" aria-expanded="true" aria-controls="admisiones">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Admisiones</span>
                </a>
                <div id="admisiones" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Calificaciones:</h6>
                        <a class="collapse-item" href="calificacionadmisiones">Registro de Calificaciones</a>
                    </div>
                </div>
            </li>
            <?php } ?>
            
            <?php 
                $introductorio = Calificacionintroductorio::validaIntroductorio($params);
                if(count($introductorio)>0){
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#introductorio" aria-expanded="true" aria-controls="admisiones">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Introductorio</span>
                </a>
                <div id="introductorio" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Calificaciones:</h6>
                        <a class="collapse-item" href="calificacionintroductorio">Registro de Calificaciones</a>
                        <a class="collapse-item" href="resumenintroductorio">Resumen de Calificaciones</a>
                    </div>
                </div>
            </li>
            <?php } ?>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#calificaciones" aria-expanded="true" aria-controls="calificaciones">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Calificaciones</span>
                </a>
                <div id="calificaciones" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registro & Reportes</h6>
                        <a class="collapse-item" href="registrocalificacion">Registro de Calificaciones</a>
                        <a class="collapse-item" href="registrocalificacionvirtual">Calificaciones C. en Línea</a>
                        <?php if($_SESSION['idusuario_appit']==23){ ?>
                        <a class="collapse-item" href="registrocalificacionvalidacion">Calificaciones Validación</a>
                        <?php } ?>
                        <a class="collapse-item" href="supletorio">Registro de Supletorios</a>
                        <!-- <a class="collapse-item" href="reporteparcial">Reporte Parcial</a> -->
                        <a class="collapse-item" href="resumen">Resumen del Periodo</a>
                        <a class="collapse-item" href="reportecalificacionvirtual">Resumen Periodo en Línea</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#asistencias" aria-expanded="true" aria-controls="asistencias">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Asistencia</span>
                </a>
                <div id="asistencias" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Asistencia & Leccionario</h6>
                        <a class="collapse-item" href="registroasistencia">Registro de Asistencia</a>
                    </div>
                </div>
            </li>
            <!-- Docentes y Materias -->
            
            <!-- Syllabus -->
            <div class="sidebar-heading">
                Planificaciones
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#syllabus" aria-expanded="true" aria-controls="syllabus">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Plan de Clases</span>
                </a>
                <div id="syllabus" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="programaanalitico">Programa Analítico</a>
                        <a class="collapse-item" href="generarpdf">Generar y Firmar PDF</a>
                    </div>
                </div>
            </li>  
            <!-- End Syllabus -->

            <!-- Tutores -->
            <?php 
                $periodos = Periodo::findActivo(); 

                foreach($periodos as $row):
                    if($row->idperiodo == 28){
                        $idperiodo = $row->idperiodo;
                    }
                endforeach;

                $res = Docente::validateTutor($idperiodo, $_SESSION['idusuario_appit']);
        
                if(count($res)){
            
            ?>            

            <div class="sidebar-heading">
                Tutoría y Cursos
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#configuracion" aria-expanded="true" aria-controls="configuracion">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Reportes</span>
                </a>
                <div id="configuracion" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cuadros de Notas:</h6>
                        <a class="collapse-item" href="cuadrogeneral">Cuadro General</a>
                        <a class="collapse-item" href="cuadroparcial">General con Asistencia</a>
                        <a class="collapse-item" href="cuadrogeneralenlinea">Cuadro General en Línea</a>
                    </div>
                </div>
            </li>
            <!-- End Tutores -->

            <!-- Coordinador de Carrera -->
            <?php } ?>
            <?php if($_SESSION['idusuario_appit']==23 || $_SESSION['idusuario_appit']==33 || $_SESSION['idusuario_appit']==34 || $_SESSION['idusuario_appit']== 39 || $_SESSION['idusuario_appit']== 29){ ?>
                <div class="sidebar-heading">
                    Coordinador de Carrera
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#coordinadorcarrera" aria-expanded="true" aria-controls="coordinadorcarrera">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        <span>Reportes</span>
                    </a>
                    <div id="coordinadorcarrera" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Reportes varios:</h6>
                            <a class="collapse-item" href="asistenciadocente">Asistencias por Docente</a>
                            <a class="collapse-item" href="leccionario">Actividades Docente</a>
                        </div>
                    </div>
                </li>
                
            <?php } ?>
            <!-- End Coordinador de Carrera -->

            <!-- Matrícula y Listas -->
            <div class="sidebar-heading">
                Solicitudes
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#solicitudes" aria-expanded="true" aria-controls="solicitudes">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span>Registro Solicitudes</span>
                </a>
                <div id="solicitudes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registro de Solicitudes:</h6>
                        <a class="collapse-item" href="simulaciones">Hospital de Simulación</a>
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