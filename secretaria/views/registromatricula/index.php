        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Matrícula</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Matrícula</li>
                </ol>
            </div>

            </div>
            <!-- /.container-fluid -->

            <div class="container-fluid border-dark">
                <div class="card border-bottom-primary">
                    <div class="card-header bg-gradient-primary text-light">
                        Estudiantes registrados en el sistema
                        <div class="float-end">
                            <a href="estudiantes" class="btn btn-sm btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Estudiante</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-10" style="margin:auto">
                            <table id="tbLista" class="table table-striped" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                                <thead class="bg-secondary text-light text-center">
                                    <tr>
                                    <td scope="col" class="text-center">#</td>
                                    <td scope="col" class="text-center">Cédula/Pasaporte</td>
                                    <td scope="col" class="text-center">Estudiante</td>
                                    <td scope="col" class="text-center"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($estudiantes as $row) :
                                    ?>
                                    <tr id="<?php echo Main::encryption($row->idestudiante); ?>">
                                        <th scope="col" class="text-center"><?php echo $i++; ?></th>
                                        <td scope="col" class="text-center"><?php echo $row->numero_identificacion; ?></td>
                                        <td scope="col"><?php echo $row->apellido1.' '.$row->apellido2.' '.$row->nombre1.' '.$row->nombre2; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-sm btn-success" title="Matricular Estudiante" value="<?php echo Main::encryption($row->idestudiante); ?>" onclick="matricular(this.value)">Matricular</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">   
                            <div class="modal-header bg-gradient-primary text-light">
                                <span>Registro de Matrícula</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>         
                            <div class="modal-body">
                                <div class="row">
                                    <form id="form">
                                        <input type="hidden" id="idestudiante" value="">
                                        <div class="row">
                                            <div class="col-4">
                                                <strong>Cédula/Pasaporte: </strong><span id="numero_identificacion"></span>
                                            </div>
                                            <div class="col-8">
                                                <strong>Estudiante: </strong><span id="estudiante"></span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="cmbidperiodo">Periodo</label>
                                                <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
                                                    <option value="">-- Seleccione Periodo --</option>
                                                    <?php 
                                                        foreach($periodo as $row): 
                                                            if($row->idperiodo != 28){
                                                    ?>
                                                        <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                                                    <?php 
                                                            }
                                                        endforeach; 
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-8">
                                                <label for="idcarrera">Carrera</label>
                                                <select name="idcarrera" id="idcarrera" class="form-select">
                                                    <option value="">-- Seleccione Carrera --</option>
                                                    <?php foreach($carreras as $row): ?>
                                                        <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label for="idnivel">Nivel</label>
                                                <select name="idnivel" id="idnivel" class="form-select">
                                                    <option value="">-- Seleccione Nivel --</option>
                                                    <?php 
                                                        foreach($niveles as $row): 
                                                            if($row->nivel != 'Cohorte 1' && $row->nivel != 'Cohorte 2' && $row->nivel != 'Cohorte 3'){
                                                    ?>
                                                    <option value="<?php echo Main::encryption($row->idnivel); ?>"><?php echo $row->nivel; ?></option>
                                                    <?php 
                                                            } 
                                                        endforeach; 
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <label for="modalidad">Modalidad</label>
                                                <select name="modalidad" id="modalidad" class="form-select">
                                                    <option value="">-- Seleccione Modalidad --</option>
                                                    <option value="Presencial">Presencial</option>
                                                    <option value="Virtual">Virtual</option>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <div class="d-grid gap-2">
                                                  <button id="btnMatricular" type="submit" class="btn btn-primary mt-4" style="margin-top:30px!Important">Matricular</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div id="tabla">
                                    
                                </div>
                            </div>
                            <div class="modal-footer bg-gradient-secondary">
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php include_once './views/layout/footer.php' ?>
        <!--    Scripts -->
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
        <script src="<?php echo DIR; ?>functions/registro-matricula.js"></script>
    </body>

</html>