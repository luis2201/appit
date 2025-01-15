
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Notas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Parciales</li>
            </ol>
          </div>

        </div>
        <!-- End of Main Content -->
        
        <div class="container-fluid border-dark">
          <div class="card border-bottom-info">
            <div class="card-header bg-info">
              <h6 class="text-light" id="nombreperiodo"></h6>
            </div>
            <div class="card-body">
              <table class="table table-bordered dataTable table-striped table-responsive text-center" id="tbLista1" width="100%" cellspacing="0" style="font-size:12px, margin:auto;">
                <thead class="bg-primary text-light text-center">
                    <tr style="height: 20px; font-weight: bold; font-size: 11px;">
                      <td scope="col" class="text-center align-middle" style="width: 5%;">#</td>
                      <td scope="col" class="align-middle" style="width: 60%;">MODULO</td>
                      <td scope="col" class="text-center align-middle">TOTAL</td>
                      <td scope="col" class="text-center align-middle">OBSERVACIÓN</th>
                    </tr>
                  </thead>
                <tbody> 

                </tbody>
              </table>
            </div>
          </div>
        </div>

      <?php include_once './views/layout/footer.php'; ?>
      <script src="<?php echo DIR; ?>functions/calificacion-ceie.js"></script>
</body>

</html>