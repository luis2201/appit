

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

            <!-- Heading -->
            <div class="sidebar-heading">
                Datos Personales
            </div>

            <!-- Nav Item - Actualizar -->
            <li class="nav-item">
                <a class="nav-link" href="datospersonales">
                    <i class="fa fa-address-card"></i>
                    <span>Actualizar datos</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mallas & Matrícula
            </div>

            <!-- Nav Item - Pensum -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMallas" aria-expanded="true" aria-controls="collapseMallas">
                    <i class="fa fa-university"></i>
                    <span>Mallas curriculares P2</span>
                </a>
                <div id="collapseMallas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mallas por carreras:</h6>
                        <a class="collapse-item" href="<?php echo DIR; ?>pdf.php?document=TS_ENFERMERIA" target="_blank">Técnico en Enfermería</a>
                        <a class="collapse-item" href="<?php echo DIR; ?>pdf.php?document=TS_SECRETARIADO_EJECUTIVO_P1_2022_REAJUSTE" target="_blank">TS Secretariado Ejecutivo</a>
                        <a class="collapse-item" href="<?php echo DIR; ?>pdf.php?document=TS_TURISMO_P1_2022_REAJUSTE" target="_blank">TS Turismo</a>
                        <a class="collapse-item" href="<?php echo DIR; ?>pdf.php?document=TS_DESARROLLO_DE_SOFTWARE_P1_2022" target="_blank">TS Desarrollo de Software</a>
                        <a class="collapse-item" href="<?php echo DIR; ?>pdf.php?document=TS_ELECTRONICA_P1_2022_REAJUSTE" target="_blank">TS Electrónica Reajuste</a>
                        <a class="collapse-item" href="<?php echo DIR; ?>pdf.php?document=TSU_ASISTENTE_EN_FARMACIA_P1_2022_REAJUSTE" target="_blank">TSU Asistente en Farmacia</a>
                        <a class="collapse-item" href="<?php echo DIR; ?>pdf.php?document=TSU_EMERGENCIAS_MEDICAS_P1_2022_REAJUSTE" target="_blank">TSU Emergencias Médicas</a>
                        <a class="collapse-item" href="<?php echo DIR; ?>pdf.php?document=TSU_REHABILITACION_FISICA_P1_2022_REAJUSTE" target="_blank">TSU Rehabilitación Física</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMatricula" aria-expanded="true" aria-controls="collapseMatricula">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Matrícula</span>
                </a>
                <div id="collapseMatricula" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de matrícula:</h6>
                        <a class="collapse-item" href="solicitudmatricula">Solicitar matrícula</a>
                        <a class="collapse-item" href="historialmatricula">Historial de matrículas</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>CEIE</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de matrícula:</h6>
                        <a class="collapse-item" href="ceie">Solicitar inscripción</a>
                        <a class="collapse-item" href="calificacionceie">Historial de Calificaciones</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsistencia" aria-expanded="true" aria-controls="collapseAsistencia">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span>Asistencia</span>
                </a>
                <div id="collapseAsistencia" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registro de Asistencia:</h6>
                        <a class="collapse-item" href="asistencia">Asistencia Parcial</a>
                    </div>
                </div>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Calificaciones
            </div>
            
            <!-- Nav Item - Calificaciones -->
        <?php 
            $periodos = Periodo::findActivo();                            
            foreach ($periodos as $row) :                
                $idperiodo = $row->idperiodo;
            endforeach;

            $params = [":idperiodo" => 21, ":idestudiante" => Main::decryption($_SESSION['idestudiante_appit'])];            
            $resp = Seccion::findSeccionIdEstudiante($params);
            
            foreach ($resp as $row) {                     
                if($row->num == 0){
        ?>
            <li class="nav-item">
                <a class="nav-link" href="notas">
                    <i class="fas fa-file-check"></i>
                    <span>Calificaciones Parciales</span>
                </a>
                <a class="nav-link" href="resumen">
                    <i class="fas fa-file-check"></i>
                    <span>Resumen del Periodo</span>
                </a>
            </li>
        <?php 
                } else{
        ?>
            <li class="nav-item">
                <a class="nav-link" href="resumenvirtual">
                    <i class="fas fa-file-check"></i>
                    <span>Resumen del Periodo</span>
                </a>
            </li>
        <?php
                }
            }
        ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">