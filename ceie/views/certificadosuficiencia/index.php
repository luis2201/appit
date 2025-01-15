        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Examen de Suficiencia</a></li>
              <li class="breadcrumb-item active" aria-current="page">Registro de Estudiantes</li>
            </ol>
          </div>

        </div>
        <!-- /.container-fluid -->
        <div class="container-fluid border-dark">
          <!-- Begin Form SolicitudMatrícula -->
            <div class="card border-bottom-primary mb-2">
              <div class="card-header bg-primary text-light">
                Registro de Estudiante para el Examen de Suficiencia
              </div>
              <div class="card-body">
                <!-- Begin FormMatricula -->
                <div class="card p-2">
                    <div class="row mb-1">
                        <div class="col-md-12">
                            <label for="cmbIdPeriodo" class="form-label">Periodo Activo</label>
                            <select class="form-select" id="cmbIdPeriodo" name="cmbIdPeriodo">   
                              <option value="">-- Seleccione Periodo --</option>
                                <?php 
                                foreach($periodos as $row): 
                                  if($row->idperiodo == 21 || $row->idperiodo == 17 || $row->idperiodo == 12 || $row->idperiodo == 6 || $row->idperiodo == 13){ 
                                ?>
                                <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                                <?php } endforeach; ?>
                            </select>
                        </div>
                    </div>                        
                </div>
                <!-- End FormMatricula -->
                <!-- Begin Lista de materias -->
                <div  class="card p-4 mt-2">
                  <table id="tbLista" class="table table-bordered table-striped" id="tbLista" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                        <tr>
                            <td class="text-center">No. Matrícula</td>
                            <td class="text-center">Estudiantes</td>
                            <td class="text-center">Calificación</td>
                            <td class="text-center"></td>
                        </tr>
                    </thead>
                    <tbody id="rows"> 

                    </tbody>
                  </table>
                </div>
                <!-- End Lista de materias -->
              </div>
            </div>
          <!-- End Form SolicitudMatricula -->
        </div>

  <?php include_once './views/layout/footer.php' ?>
  <script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
  <script src="<?php echo DIR; ?>functions/certificado-suficiencia.js?v=2.0.1"></script>
</body>

</html>