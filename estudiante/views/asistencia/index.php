
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Notas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Primer Parcial</li>
            </ol>
          </div>

        </div>
        <!-- End of Main Content -->
        
        <div class="container-fluid border-dark">
          <div class="card border-bottom-info">
            <div class="card-header bg-info">
              <h6 class="text-light"><strong>Periodo II (Noviembre 2024 - Abril 2025)</strong></h6>
            </div>
            <div class="card-body table-responsive">
              <table id="tbLista" class="table table-bordered dataTable table-striped table-responsive" id="tbLista1" width="100%" cellspacing="0" style="font-size:12px">
                <thead class="bg-primary text-light text-center">
                    <tr>
                      <th class="text-center" colspan="49">PRIMER PARCIAL</th>
                    </tr>
                    <tr style="height: 20px; font-weight: bold; font-size: 11px;">
                      <th scope="col" class="text-center align-middle" style="width: 3%;">#</th>
                      <th scope="col" class="text-center align-middle" style="width: 10%;">CODIGO</th>
                      <th scope="col" class="text-center align-middle" style="width: 60%;">MATERIA</th>
                      <th scope="col" class="text-center align-middle">Horas Clases</th>
                      <th scope="col" class="text-center align-middle">Número de Asistencias</th>
                      <th scope="col" class="text-center align-middle">Número de Inasistencias</th>
                      <th scope="col" class="text-center align-middle">% Asistencia</th>
                      <th scope="col" class="text-center align-middle">% Inasistencia</th>
                      <th scope="col" class="text-center align-middle">Observación</th>
                    </tr>
                  </thead>
                <tbody> 
                  
                </tbody>
              </table>

            </div>
          </div>
        </div>

      <?php include_once './views/layout/footer.php'; ?>
      <script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
      <script src="<?php echo DIR; ?>functions/asistencia.js?v=1.0.1"></script>
</body>

</html>