
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Notas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Resumen de Notas</li>
            </ol>
          </div>

        </div>
        <!-- End of Main Content -->
        
        <div class="container-fluid border-dark">
          <div class="card border-bottom-info">
            <div class="card-header bg-info">
              <h6 class="text-light"><strong>Periodo II (Noviembre 2022-Abril 2023)</strong></h6>
            </div>
            <div class="card-body">
              <div class="container">
                <table class="table table-bordered dataTable table-striped table-responsive text-center" id="tbLista" width="100%" cellspacing="0">
                    <thead class="text-light text-center" style="font-size:13px">
                        <tr>
                            <th class="text-center bg-primary" colspan="14">RESUMEN DE NOTAS</th>
                        </tr>
                        <tr style="height: 20px; font-weight: bold; font-size: 11px;">
                            <td scope="col" class="text-center align-middle bg-primary" rowspan="2" style="width: 15%;">CODIGO</td>
                            <td scope="col" class="text-center align-middle bg-primary" rowspan="2" style="width: 60%;">MATERIA</td>
                            <td scope="col" class="text-center align-middle bg-primary" rowspan="2">PROMEDIO<br>PRIMER PARCIAL</td>
                            <td scope="col" class="text-center align-middle bg-primary" rowspan="2">PROMEDIO<br>SEGUNDO PARCIAL</td>
                            <td scope="col" class="text-center align-middle bg-primary" rowspan="2">SUPLETORIO</td>
                            <td scope="col" class="text-center align-middle bg-primary" rowspan="2">SUMA<br>PROMEDIOS</td>
                            <td scope="col" class="text-center align-middle bg-primary" rowspan="2">PORCENTAJE<br>FALTAS</td>
                            <td scope="col" class="text-center align-middle bg-primary" rowspan="2">OBSERVACION</td>
                        </tr>
                    </thead>
                    <tbody> 
                      
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      <?php include_once './views/layout/footer.php'; ?>
      <script src="<?php echo DIR; ?>functions/resumen.js"></script>
</body>

</html>