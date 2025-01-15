<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:;">Estudiantes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cambio Cédula y/o Correo</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">

    </div>
    <div class="card-body">
      <!-- Tabla de resultados -->
        <table id="tbLista" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
            <thead class="bg-primary text-light text-center">
            <tr>
                <td scope="col" class="text-center">#</td>
                <td scope="col" class="text-center">No. Identificación</td>
                <td scope="col" class="text-center">Apellidos</td>
                <td scope="col" class="text-center">Nombres</td>
                <td scope="col" class="text-center">Correo Electrónico</td>
                <td scope="col" class="text-center"></td>
            </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($estudiantes as $row): ?>
                    <tr>
                        <td scope="col" class="text-center"><?php echo $i++; ?></td>
                        <td scope="col" class="text-center"><?php echo $row->numero_identificacion; ?></td>
                        <td scope="col"><?php echo $row->apellido1.' '.$row->apellido2; ?></td>
                        <td scope="col"><?php echo $row->nombre1.' '.$row->nombre2; ?></td>
                        <td scope="col" class="text-center password-cell"><?php echo $row->correo_electronico; ?></td>
                        <td class="text-center">
                        <button id="<?php echo Main::encryption($row->idestudiante); ?>" class="btn btn-warning btn-sm" onclick="editDatos(this)"><i class="fa fa-edit" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- End Tabla de resultados -->
        
        <!-- Modal Body -->
        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title" id="modalTitleId">
                  
                </h6>
                <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cerrar()"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="idestudiante" name="idestudiante">
                <div class="row">
                  <div class="col">
                    <label for="numero_identificacion">Número de Identificación</label>
                    <input type="text" id="numero_identificacion" name="numero_identificacion" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="correo_electronico">Correo Electrónico</label>
                    <input type="text" id="correo_electronico" name="correo_electronico" class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" ata-bs-dismiss="modal" onclick="cerrar()">Cerrar</button>
                <button type="button" id="btnUpdateDatos" class="btn btn-success"><i class="far fa-save"></i> Actualizar</button>
              </div>
            </div>
          </div>
        </div>
        
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/cedulacorreo-estudiante.js?v=1.1.5"></script>
</body>

</html>