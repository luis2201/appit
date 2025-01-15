<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Syllabus</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro Porgrama Analìtico y Syllabus</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
    <div class="card border-bottom-primary">
        <div class="card-header bg-primary text-light">
            <h5>Programa Analítico de la Asignatura</h5>
        </div>
        <div class="card-body">
            <form action="procesar.php" method="post">
        
                <!-- Parámetros de búsqueda -->
                <div class="form form-group">
                    <div class="row">          
                        <div class="col-md-4">
                            <label for="cmbidperiodo">Periodo Académico</label>
                            <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
                            <?php foreach($periodos as $row): ?>
                                <!-- <option value="<?php //echo $row->idperiodo; ?>"><?php //echo $row->periodo; ?></option> -->
                                <option value="<?php echo Main::encryption(12); ?>"><?php echo 'PI (MAYO - OCTUBRE 2023)'; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="idcarrera">Carrera</label>
                            <select name="idcarrera" id="idcarrera" class="form-select">
                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="idnivel">Curso</label>
                            <select name="idnivel" id="idnivel" class="form-select">
                                <option value="">-- Seleccione Nivel --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="idmateria">Materia</label>
                            <select name="idmateria" id="idmateria" class="form-select">
                            <option value="">-- Seleccione Materia --</option>

                            </select>
                        </div>
                        <div class="col-md-2 mt-3">
                            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false">
                            <i class="fas fa-edit"></i> Registrar Syllabus
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Parámetros de búsqueda -->

                <!-- Modal -->
                <div class="" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size:80%;">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">            
                            <div class="modal-body">
                                <div class="card">
                                    <!-- Programa Analítico de Asignatura -->
                                    <div class="card-header bg-primary text-center text-light">
                                        <h5>Programa Analítico de la Asignatura</h5>
                                    </div>
                                    <div class="card-body">                                
                                        <!-- Datos de la Asignatura -->
                                        <div class="row">
                                            <div class="mb-3 col-8">
                                                <label for="nombreAsignatura" class="form-label">Asignatura:</label>                                            
                                                <input type="text" id="nombreAsignatura" name="nombreAsignatura" class="form-control" disabled>
                                            </div>                                            
                                            <div class="mb-3 col-4">
                                                <label for="periodoAcademico" class="form-label">Periodo Académico Ordinario (PAO):</label>
                                                <input type="text" id="periodoAcademico" name="periodoAcademico" class="form-control" disabled>
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="caracterizacion" class="form-label">Caracterización:</label>
                                                <textarea id="caracterizacion" name="caracterizacion" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="caracterizacion" class="form-label">Formación en valores y habilidades blandas:</label>
                                                <textarea id="caracterizacion" name="caracterizacion" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label for="vinculacion" class="form-label"> Educación Ambiental y para Desarrollo Sostenible:
                                                    <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                    <div class="custom-tooltip">
                                                        Describe acciones que permiten fortalecer el trabajo de su asignatura con otras materias de la malla curricular, la investigación y la vinculación 
                                                        a través de la práctica y en el desempeño de su profesión. No solo del Nivel, si no horizontal y vertical. Declarar los nexos que necesitan unas 
                                                        de otras. Ejemplos: a). La asignatura de Educación Física integra aspectos relacionados con el desarrollo de la motricidad, en ese sentido integra 
                                                        aspectos técnicos, científicos y tecnológicos asociados a la actividad física. b). En la carrera de Electrónica o Desarrollo de Software, 
                                                        la asignatura Matemática y Lógica Matemática crean las condiciones para entender las asignaturas profesionalizantes como Fundamentos de la 
                                                        Programación, Programación I y II, Bases de Datos, etc., pues es la asignatura que demuestra cómo funcionan las computadoras, los teléfonos 
                                                        inteligentes y demás dispositivos digitales a través de los Sistemas Numéricos, el Álgebra de Boole, el trabajo con funciones para construir 
                                                        circuitos eléctricos, entre otras.
                                                    </div>
                                                </label>
                                                <textarea id="vinculacion" name="vinculacion" class="form-control" required></textarea>
                                            </div>
                                        </div>                                                                                                             
                                        <div class="row">
                                            <div class="mt-3 mb-3 col">
                                                <label for="caracterizacion" class="form-label">Objetivos:
                                                    <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                    <div class="custom-tooltip">
                                                        Enunciar los objetivos específicos de la asignatura con fundamento en los objetivos generales de la carrera. Formularlos con verbo en infinitivo, 
                                                        debe indicar la acción, los medios y fines (lo que se hará, cómo y con qué propósito). Se recomienda utilizar la Taxonomía de Bloom (memorizar, 
                                                        comprender, aplicar, analizar, evaluar, crear, entre otros).
                                                    </div>
                                                </label>
                                                <textarea id="vinculacion" name="vinculacion" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mt-3 mb-3 col">
                                                <label for="caracterizacion" class="form-label">Competencia/s:
                                                    <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                    <div class="custom-tooltip">
                                                        Incluir la o las competencias expresadas en el perfil de egreso con las cuales se contribuye a su formación y desarrollo desde su asignatura. (No 
                                                        redactar en infinitivo).
                                                    </div>
                                                </label>
                                                <textarea id="vinculacion" name="vinculacion" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mt-3 mb-3 col">
                                                <label for="caracterizacion" class="form-label">Funciones:</label>
                                                <textarea id="vinculacion" name="vinculacion" class="form-control" required></textarea>
                                            </div>
                                        </div>                                        
                                        <div class="card mt-3 p-2">                                   
                                            <div class="row">
                                                <label style="font-weight:bolder; font-size:16px;">Contenidos Generales</label>
                                            </div>   
                                            <table class="table" style="width:100%">
                                                <thead class="bg-primary text-light">
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-center">Unidades Temáticas</th>
                                                        <th class="text-center">Descriptión</th>
                                                    </tr>                                                
                                                </thead>
                                                <tbody>                                                    
                                                    <tr>
                                                        <th style="width:3%">UT-1</th>
                                                        <td style="width:25%"><input type="text" class="form-control"></td>
                                                        <td><input type="text" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:3%">UT-2</th>
                                                        <td style="width:25%"><input type="text" class="form-control"></td>
                                                        <td><input type="text" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:3%">UT-3</th>
                                                        <td style="width:25%"><input type="text" class="form-control"></td>
                                                        <td><input type="text" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:3%">UT-4</th>
                                                        <td style="width:25%"><input type="text" class="form-control"></td>
                                                        <td><input type="text" class="form-control"></td>
                                                    </tr>
                                                </tbody>
                                            </table>                                                                             
                                        </div>                                                                                             
                                        <div class="mb-3">
                                            <label for="metodologia" class="form-label">Metodología:
                                                <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                <div class="custom-tooltip">
                                                    Explicar la forma en la que el estudiante va a ir alcanzando los objetivos planteados. La metodología debe estar orientada hacia la adquisición de los logros de aprendizaje. 
                                                    Indicar cómo se desarrollará el proceso de enseñanza-aprendizaje, a través de qué estrategias, métodos, técnicas, instrumentos y recursos didácticos, todo en relación con el 
                                                    modelo educativo en el cual se sustenta el ITSUP.
                                                </div>                                                
                                            </label>
                                            <textarea id="metodologia" name="metodologia" class="form-control" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="evaluacion" class="form-label">Procedimientos de Evaluación:
                                                <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                <div class="custom-tooltip">
                                                    Describir lo más relevante sobre la metodología de evaluación que utilizará. Varias de las actividades van a concluir con productos como: informes de prácticas o visitas 
                                                    técnicas, trabajos, análisis de textos, exposiciones, resúmenes, cuestionarios, ensayos, organizadores gráficos, autoevaluaciones. Se indicará además; de ser el caso, la 
                                                    realización de pruebas orales o escritas sobre el trabajo presencial y no presencial que el estudiante ha de desarrollar.
                                                </div>
                                            </label>
                                            <textarea id="evaluacion" name="evaluacion" class="form-control" required></textarea>
                                        </div>
                                        <div class="card mt-3 p-2">                                   
                                            <div class="row">
                                                <label style="font-weight:bolder; font-size:16px;">Bibliografía - Fuentes Bibliográficas</label>
                                            </div>
                                            <table class="table" style="width:100%">                                                                                                                       
                                                <tr>
                                                    <th style="width:15%;">Bibliografía Básica</th>                                                    
                                                    <td><textarea class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <th style="width:15%;">Bibliografía Complementaria</th>                                                    
                                                    <td><textarea class="form-control"></textarea></td>
                                                </tr>                                         
                                            </table>                                                                             
                                        </div>                                        
                                        <!-- /Fin del Programa Analítico de Asignatura -->
                                        <!-- Datos Generales -->
                                        <div class="card p-2 mt-3">
                                            <div class="card-header" style="font-weight:bold">
                                                DATOS GENERALES Y ESPECÍFICOS DE LA ASIGNATURA
                                            </div>
                                            <div class="card-body">
                                                <table class="table" style="width:100%">
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Código de Asignatura
                                                                <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                                <div class="custom-tooltip">

                                                                </div>
                                                            </label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Nombre de Asignatura
                                                                <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                                <div class="custom-tooltip">

                                                                </div>
                                                            </label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Prerrequisito
                                                                <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                                <div class="custom-tooltip">

                                                                </div>
                                                            </label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Correquisito
                                                                <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                                <div class="custom-tooltip">

                                                                </div>
                                                            </label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Carrera
                                                                <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                                <div class="custom-tooltip">

                                                                </div>
                                                            </label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Unidad Articular (eje)
                                                                <span class="tooltip-trigger"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i></span>                                                
                                                                <div class="custom-tooltip">

                                                                </div>
                                                            </label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Campo de Formación</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Periodo Lectivo</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Modalidad</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Periodo Académico</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Paralelo</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Horario de Clase</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Horario para Tutorías</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Profesor que imparte la asignatura</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Perfil del profesor</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Total de horas (semanales)</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Horas de docencia (HD)</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Horas para práctica (PA)</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-primary text-light" style="width:20%">                                                            
                                                            <label for="vinculacion" class="form-label">Horas de Trabajo autónomo (TA)</label>
                                                        </th>
                                                        <td>                                                    
                                                            <input type="text" id="vinculacion" name="vinculacion" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /Fin Datos Generales -->
                                        <!-- Estructura de la Asignatura -->
                                        <div class="card p-2 mt-3">
                                            <div class="card-header" style="font-weight:bold">
                                                DATOS GENERALES Y ESPECÍFICOS DE LA ASIGNATURA
                                            </div>
                                            <div class="card-body">
                                                <table class="table" style="width:100%">
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /Fin Estructura de la Asignatura -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
                            </div>
                        </div>
                    </div>   
                </div>  

            </form>
        </div>
    </div>
</div> 

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo DIR; ?>functions/Syllabus.js?v=1"></script>
</body>
</html>