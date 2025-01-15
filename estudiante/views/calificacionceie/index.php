
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
              <table class="table table-bordered dataTable table-striped text-center" id="tbLista1" width="100%" cellspacing="0" style="font-size:12px, margin:auto;">
                <thead class="bg-primary text-light text-center">
                    <tr style="font-weight: bold; font-size: 11px;">
                      <th scope="col" class="text-center align-middle" style="width: 5%;">#</th>
                      <th scope="col" class="text-center align-middle">PERIODO</th>
                      <th scope="col" class="text-center align-middle">MODULO</th>
                      <th scope="col" class="text-center align-middle">MATRICULA N°</th>
                      <th scope="col" class="text-center align-middle">CALIFICACION</th>
                      <th scope="col" class="text-center align-middle">OBSERVACIÓN</th>
                    </tr>
                  </thead>
                <tbody> 
                <?php $i = 1; ?>
                <?php foreach($calificaciones as $row): ?>
                  <tr style="font-weight: bold; font-size: 11px;">
                    <td scope="col" class="text-center align-middle" style="width: 5%;"><?php echo $i++; ?></td>
                    <td scope="col" class="text-center align-middle"><?php echo $row->alias; ?></td>
                    <td scope="col" class="text-center align-middle"><?php echo $row->idmodulo ?></td>
                    <td scope="col" class="text-center align-middle"><?php echo $row->idmatricula; ?></td>
                    <td scope="col" class="text-center align-middle"><?php echo $row->calificacion; ?></td>
                    <td scope="col" class="text-center align-middle">
                      <?php if($row->calificacion>=70){ ?>
                        <span>Aprobado</span>
                      <?php } else{ ?>
                        <span class="badge bg-danger">Reprobado</span>
                      <?php } ?>
                    </th>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      <?php include_once './views/layout/footer.php'; ?>
      <script src="<?php echo DIR; ?>functions/calificacion-ceie.js"></script>
</body>

</html>