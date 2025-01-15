<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="pagomatricula">Pagos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pago de Matrícula</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid border-dark">
  <div class="card border-bottom-primary">
    <div class="card-header bg-gradient-primary text-light">
      <h6 class="float-left">Pago de Matrícula</h6>
      <a href="pagomatricula" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-square" aria-hidden="true"></i> Registrar Pago</a>
    </div>
    <div class="card-body">            
      <table id="tbLista" class="table table-stripped">
        <thead>
          <tr class="text-center">
            <th scope="col"># Factura</th>
            <th scope="col" class="text-center">No. Identificación</th>
            <th scope="col" class="text-center">F. Nacimiento</th>
            <th scope="col" class="text-center">Estudiante</th>
            <th scope="col">Fecha Pago</th>
            <th scope="col" class="text-center">Valor Pago</th>
            <th scope="col" class="text-center"></th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($pagos as $row):
        ?>
          <tr>
            <td class="text-center"><?php echo $row->numero_factura; ?></td>
            <td class="text-center"><?php echo $row->numero_identificacion; ?></td>
            <td class="text-center"><?php echo $row->fecha_nacimiento; ?></td>
            <td class="text-center"><?php echo $row->estudiante; ?></td>
            <td class="text-center"><?php echo $row->fecha_pago; ?></td>
            <td class="text-center"><?php echo $row->valorpago; ?></td>
            <td class="text-center">
              <button id="<?php echo $row->numero_identificacion; ?>" class="btn btn-sm btn-success" onclick="viewDatos(this.id)"><i class="far fa-id-card"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>      
    </div>
  </div>


  <div id="datosModal" data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Datos del Estudiante</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img id="foto" class="img-fluid rounded-start" style="width:85%">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 id="estudiante" class="card-title"></h5>
                  <hr>
                  <p id="numero_identificacion" class="card-text"></p>
                  <p id="fecha_nacimiento" class="card-text"></p>
                  <p id="correo_electronico" class="card-text"></p>
                  <p id="numero_celular" class="card-text"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include_once './views/layout/footer.php' ?>
<script src="<?php echo DIR; ?>functions/listapago-matricula.js"></script>
</body>

</html>