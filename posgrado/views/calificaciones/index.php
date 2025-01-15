        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Calificaciones</a></li>
              <li class="breadcrumb-item active" aria-current="page">Calificaciones Individuales</li>
            </ol>
          </div>

        </div>
        <!-- /.container-fluid -->
        <div class="container-fluid border-dark">
          <!-- Begin Form SolicitudMatrícula -->
            <div class="card border-bottom-primary mb-2">
              <div class="card-header bg-primary text-light">
                Calificaciones Individuales
              </div>
              <div class="card-body p-4">
                <!-- Begin FormMatricula -->
                <div id="formulario" class="card">
                  <div class="form-group col-12">
                    <div class="row mb-1">
                      <div class="col-md-4">
                        <label for="idperiodo" class="form-label">Periodo</label>
                        <select class="form-select" id="idperiodo" name="idperiodo">
                            <option value="">-- Seleccione Periodo --</option>
                            <?php foreach($periodos as $row): ?>
                                <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="idcarrera" class="form-label">Carrera</label>
                        <select class="form-control" id="idcarrera" name="idcarrera">
                            <option value="">-- Seleccione Carrera --</option>
                            <?php foreach($carreras as $row): 
                                if($row->idcarrera == 4 || $row->idcarrera == 49 || $row->idcarrera == 37 || $row->idcarrera == 38 || $row->idcarrera == 41 || $row->idcarrera == 48){
                            ?>
                                <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                            <?php } endforeach; ?>
                        </select>
                      </div>                    
                      <div class="col-md-2 text-center">
                        <label for="verLista">Lista Estudiantes</label>
                        <button id="verLista" class="btn btn-primary form-control"><i class="fas fa-eye"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End FormMatricula -->
                <!-- Begin Lista de materias -->
                <div  id="tbestudiantes" class="card p-4 mt-3">
  
                </div>
                <!-- End Lista de materias -->
                <!-- Begin Materias -->
                <div id="modalCalificaciones" class="modal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h5 class="modal-title">Reporte de Calificaciones</h5>
                        <input id="txtIdMatricula" type="hidden">                        
                      </div>
                      <div id="tbcalificaciones" class="modal-body">
                                                  
                      </div>
                      <div class="modal-footer">
                        <div class="col">
                        <p style="font-size:9px">
                           <strong>TD</strong> = Total Docencia <br>
                           <strong>TP</strong> = Total Prácticas <br>
                           <strong>TA</strong> = Total Aprendizaje <br>
                           <strong>TR</strong> = Total Resultados <br>
                           <strong>P </strong> = Calificación Parcial
                        </p>
                        </div>
                        <button id="btnCerrar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Materias -->
              </div>
            </div>
          <!-- End Form SolicitudMatricula -->
        </div>

  <?php include_once './views/layout/footer.php' ?>
  <script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
  <script src="<?php echo DIR; ?>functions/calificaciones.js?v=1.1.1"></script>
</body>

</html>