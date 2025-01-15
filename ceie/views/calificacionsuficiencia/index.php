        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Calificacaciones</a></li>
              <li class="breadcrumb-item active" aria-current="page">Registro de Calificación Examen de Suficiencia</li>
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
                <!-- Begin FormMatricula -->
                <div class="card">
                    <div class="form-group col-12">
                        <div class="row mb-1">
                        <div class="col-10">
                            <label for="idperiodo" class="form-label">Periodo</label>
                            <select class="form-select" id="idperiodo" name="idperiodo">
                                <option value="">-- Seleccione un Periodo --</option>
                                <?php 
                                  foreach($periodos as $row):           
                                    if($row->idperiodo == 21 || $row->idperiodo == 17 || $row->idperiodo == 12 || $row->idperiodo == 6 || $row->idperiodo == 13){                          
                                ?>
                                  <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                                <?php } endforeach; ?>
                            </select>
                        </div>
                        <div class="col-2">
                            <button id="btnMostrar" class="btn btn-primary mt-4" style="width:100%; margin-top:30px!Important;">Mostrar</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End FormMatricula -->
                <!-- Begin Modal de calificaciones -->
                <div class="modal fade" id="calificacionesModal" tabindex="-1" aria-labelledby="calificacionesModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">                      
                      <div class="modal-body">
                        <div  class="card p-4 mt-2">                
                            <div class="row">
                                <div class="col text-center">
                                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-8" style="margin:auto;">
                                <div class="row">
                                  <div id="periodo" class="col-6 text-end" style="font-size:0.8em"></div>                                  
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div id="tabla" class="col-8" style="margin:auto">

                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" id="btnCerrar" class="btn btn-secondary">Cerrar</button>                        
                      </div>
                    </div>
                  </div>

                  <div class="toast" id="myToast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-success text-light">
                      <strong class="mr-auto">Registro de calificación</strong>
                      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="toast-body">
                      Calificación registrada satisfactoriamente
                    </div>
                  </div>
                </div>
                <!-- End Modal de calificaciones -->

              </div>
            </div>
          <!-- End Form SolicitudMatricula -->
        </div>
        

  <?php include_once './views/layout/footer.php' ?>
  <script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
  <script src="<?php echo DIR; ?>functions/calificacion-suficiencia.js?v=1.0.3"></script>
  <style>
    /* Estilo para superponer el toast al modal */
    .toast {
      position: absolute;
      z-index: 1050; /* Ajusta este valor según sea necesario para que se superponga correctamente */
      top: 50px; /* Ajusta la posición vertical del toast */
      right: 50px; /* Ajusta la posición horizontal del toast */
    }
  </style>
</body>
</html>