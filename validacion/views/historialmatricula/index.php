
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Matrícula</a></li>
              <li class="breadcrumb-item active" aria-current="page">Historial de Matrículas</li>
            </ol>
          </div>

        </div>
        <!-- End of Main Content -->
        
        <div class="container-fluid border-dark">
          <div class="card border-bottom-info">
            <div class="card-header bg-info">
              <h6 class="text-light"><strong>Periodo II (Mayo-Octubre 2023)</strong></h6>
            </div>
            <div class="card-body">
              <table class="table table-bordered dataTable table-striped text-center" id="tbLista" width="100%" cellspacing="0">
                <thead class="bg-primary text-light">
                  <tr class="text-center">
                    <td>Código</td>
                    <td>Materia</td>
                    <td>Nivel</td>
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
      <script src="<?php echo DIR; ?>functions/historial-matricula.js?v=1.0.1"></script>
</body>

</html>