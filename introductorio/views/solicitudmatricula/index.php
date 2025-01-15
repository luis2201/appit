        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Matrícula</a></li>
              <li class="breadcrumb-item active" aria-current="page">Solicitar Matrícula</li>
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
                    <strong>Seleccione</strong> las materias que cursará este Periodo
                  </div>
                </div>
                <!-- Begin FormMatricula -->
                <div id="formulario" class="card">
                  <input type="hidden" id="estudianteid" name="estudianteid" value="<?php echo $_SESSION['idestudiante_appit']; ?>">
                  <div class="form-group col-12">
                    <div class="row mb-1">
                      <div class="col-md-4">
                        <label for="cmbidperiodo" class="form-label">Periodo</label>
                        <select class="form-control" id="cmbidperiodo" name="cmbidperiodo">
                          
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="idcarrera" class="form-label">Carrera</label>
                        <select class="form-control" id="idcarrera" name="idcarrera">
                            
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="idnivel" class="form-label">Nivel</label>
                        <select class="form-control" id="idnivel" name="idnivel">
                              
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End FormMatricula -->
                <!-- Begin Lista de materias -->
                <div  id="materias" class="card p-4">
                  <table class="table table-bordered table-striped text-center" id="tbLista" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                      <tr class="text-center">
                        <td>Código</td>
                        <td>Materia</td>
                        <td>Nivel</td>
                        <td>Estado</td>
                      </tr>
                    </thead>
                    <tbody> 
                      
                    </tbody>
                  </table>
                </div>
                <!-- End Lista de materias -->
              </div>
            </div>
          <!-- End Form SolicitudMatricula -->
        </div>

  <?php include_once './views/layout/footer.php' ?>
  <script src="<?php echo DIR; ?>functions/solicitud-matricula.js"></script>
</body>

</html>