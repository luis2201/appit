        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Módulos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Lista de Inscritos al Módulo de Inglés</li>
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
                        <div class="col-md-5">
                            <label for="idperiodo" class="form-label">Periodo</label>
                            <select class="form-select" id="idperiodo" name="idperiodo">
                                <option value="">-- Seleccione un Periodo --</option>
                                <?php 
                                  foreach($periodos as $row): 
                                    if ($row->idperiodo == 12 || $row->idperiodo == 17 || $row->idperiodo == 21) {
                                ?>
                                  <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                                <?php } endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-5">
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
                            <button id="btnMostrar" class="btn btn-primary mt-4" style="width:100%; margin-top:30px!Important;">Mostrar</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End FormMatricula -->
                <!-- Begin Lista de materias -->
                <div  class="card p-4 mt-2">
                  <table id="tbLista" class="table table-bordered table-striped" id="tbLista" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                      <tr class="text-center">
                          <td>#</td>
                          <td>Estudiante</td>
                          <td>Módulo</td>
                          <td>Periodo</td>
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
  <script src="<?php echo DIR; ?>functions/lista-inscritos.js"></script>
</body>

</html>