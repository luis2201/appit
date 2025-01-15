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
                <div id="alerta"></div>
                <!-- Begin FormMatricula -->
                <div id="formulario" class="card">
                    <form id="form">
                        <input type="hidden" id="admisionesid" name="admisionesid" value="<?php echo $_SESSION['idadmisiones_appit']; ?>">
                        <div class="form-group col-12">
                            <div class="row mb-1">
                                <div class="col-md-4">
                                    <label for="cmbidperiodo" class="form-label">Periodo</label>
                                    <select class="form-control" id="cmbidperiodo" name="cmbidperiodo">
                                        <?php 
                                            foreach ($periodos as $row):
                                                if($row->idperiodo == 28){
                                        ?>
                                            <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                                        <?php } endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="idcarrera" class="form-label">Carrera</label>
                                    <select class="form-control" id="idcarrera" name="idcarrera">
                                        <option value="">-- Seleccione Carrera --</option>
                                        <?php 
                                            foreach ($carreras as $row):
                                              if($row->idcarrera == 49 ||$row->idcarrera == 48 || $row->idcarrera == 41 || $row->idcarrera == 38 || $row->idcarrera == 36 || $row->idcarrera == 4 || $row->idcarrera == 50 || $row->idcarrera == 53 || $row->idcarrera == 54){
                                        ?>
                                            <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                                        <?php } endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2" style="margin-top:30px;">
                                    <button type="submit" class="btn btn-primary" style="width:100%;">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          <!-- End Form SolicitudMatricula -->
        </div>

  <?php include_once './views/layout/footer.php' ?>
  <script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
  <script src="<?php echo DIR; ?>functions/inscripcion.js?v=1.0.1"></script>
</body>

</html>