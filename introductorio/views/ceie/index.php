        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Matrícula</a></li>
              <li class="breadcrumb-item active" aria-current="page">Solicitar Inscripción Módulo de Inglés</li>
            </ol>
          </div>

        </div>
        <!-- /.container-fluid -->

        <div class="container-fluid border-dark">
          <!-- Begin Form SolicitudMatrícula -->
            <div class="card border-bottom-primary mb-2">
              <div class="card-header bg-primary text-light">
                Solicitud de Matrícula
              </div>
              <div class="card-body">
                <div id="alerta">
                  <div class="alert alert-success">
                    <strong>Seleccione</strong> el módulo que cursará este Periodo
                  </div>
                </div>
                <!-- Begin FormMatricula -->
                <div class="card">
                    <input type="hidden" id="estudianteid" name="estudianteid" value="<?php echo $_SESSION['idestudiante_appit']; ?>">
                    <div class="form-group col-12">
                        <div class="row mb-1">
                        <div class="col-md-4">
                            <label for="cmbidperiodo" class="form-label">Periodo</label>
                            <select class="form-control" id="cmbidperiodo" name="cmbidperiodo">
                                <?php foreach($periodoactivo as $row): ?>
                                    <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="idmodulo" class="form-label">Módulo</label>
                            <select class="form-select" id="idmodulo" name="idmodulo">
                                <option value="">-- Seleccione un módulo --</option>
                                <option value="<?php echo Main::encryption(1); ?>">A1.1 (Módulo 1)</option>
                                <option value="<?php echo Main::encryption(2); ?>">A1.2 (Módulo 2)</option>
                                <option value="<?php echo Main::encryption(3); ?>">A2.1 (Módulo 3)</option>
                                <option value="<?php echo Main::encryption(4); ?>">A2.2 (Módulo 4)</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button id="btnMatricular" class="btn btn-primary mt-4" style="width:100%; margin-top:30px!Important;">Matricularse</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End FormMatricula -->
                <!-- Begin Lista de materias -->
                <div  class="card p-4">
                  <table id="tbLista" class="table table-bordered table-striped text-center" id="tbLista" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                      <tr class="text-center">
                        <td>Periodo</td>
                        <td>Módulo</td>
                        <td>Estado</td>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php foreach($modulos as $row): ?>
                        <tr>
                          <td><?php echo $row->periodo; ?></td>
                          <td>
                            <?php 
                              switch ($row->idmodulo) {
                                case 1:
                                  echo 'A1.1 (Módulo 1)';
                                  break;
                                case 2:
                                  echo 'A1.2 (Módulo 2)';
                                  break;
                                case 3:
                                  echo 'A2.1 (Módulo 3)';
                                  break;
                                case 4:
                                  echo 'A2.2 (Módulo 4)';
                                  break;
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              switch ($row->estado) {
                                case 'PENDIENTE':
                                  echo '<span class="badge bg-secondary">';
                                  break;
                                case 'INSCRITO':
                                  echo '<span class="badge bg-primary">';
                                  break;
                                case 'EXONERADO':
                                  echo '<span class="badge bg-success">';
                                  break;
                              }
                              
                              echo $row->estado.'</span>';
                            ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- End Lista de materias -->
              </div>
            </div>
          <!-- End Form SolicitudMatricula -->
        </div>

  <?php include_once './views/layout/footer.php' ?>
  <script src="<?php echo DIR; ?>functions/ceie.js"></script>
</body>

</html>