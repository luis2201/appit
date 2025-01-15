
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
              <table class="table table-bordered dataTable table-striped table-responsive text-center" id="tbLista1" width="100%" cellspacing="0" style="font-size:12px">
                <thead class="bg-primary text-light text-center">
                    <tr>
                      <th class="text-center" colspan="12">PRIMER PARCIAL</th>
                    </tr>
                    <tr style="height: 20px; font-weight: bold; font-size: 11px;">
                      <td scope="col" class="text-center align-middle" rowspan="2" style="width: 5%;">#</td>
                      <td scope="col" class="align-middle" rowspan="2" style="width: 60%;">MATERIA</td>
                      <td scope="col" class="text-center" colspan="2">DOCENCIA (15pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>DOCENCIA</td>
                      <td scope="col" class="text-center" style="width: 100px" rowspan="2">PRACTICAS DE<br>APLICACIÓN Y<br>EXPERIMENTACIÓN<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>PRACTICAS</td>
                      <td scope="col" class="text-center" style="width: 100px" rowspan="2">ACTIVIDADES DE<br>APRENDIZAJE<br>AUTONOMO<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>AAU</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">RESULTADOS (15pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>RESULTADOS</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL</th>
                    </tr>
                    <tr style="font-weight: bold;">
                      <td scope="col" class="text-center" style="width: 100px">Aporte<br>(10pts)</td>
                      <td scope="col" class="text-center" style="width: 100px;">Lecciones<br>(5pts)</td>
                    </tr>
                  </thead>
                <tbody> 

                </tbody>
              </table>

              <hr>
              
              <table class="table table-bordered dataTable table-striped table-responsive text-center" id="tbLista2" width="100%" cellspacing="0" style="font-size:12px">
              <thead class="bg-primary text-light text-center">
                    <tr>
                      <th class="text-center" colspan="12">SEGUNDO PARCIAL</th>
                    </tr>
                    <tr style="height: 20px; font-weight: bold; font-size: 11px;">
                      <td scope="col" class="text-center align-middle" rowspan="2" style="width: 5%;">#</td>
                      <td scope="col" class="align-middle" rowspan="2" style="width: 60%;">MATERIA</td>
                      <td scope="col" class="text-center" colspan="2">DOCENCIA (15pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>DOCENCIA</td>
                      <td scope="col" class="text-center" style="width: 100px" rowspan="2">PRACTICAS DE<br>APLICACIÓN Y<br>EXPERIMENTACIÓN<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>PRACTICAS</td>
                      <td scope="col" class="text-center" style="width: 100px" rowspan="2">ACTIVIDADES DE<br>APRENDIZAJE<br>AUTONOMO<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>AAU</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">RESULTADOS (15pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>RESULTADOS</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL</th>
                    </tr>
                    <tr style="font-weight: bold;">
                      <td scope="col" class="text-center" style="width: 100px">Aporte<br>(10pts)</td>
                      <td scope="col" class="text-center" style="width: 100px;">Lecciones<br>(5pts)</td>
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
      <script src="<?php echo DIR; ?>functions/notas.js?v=1.0.6"></script>
</body>

</html>