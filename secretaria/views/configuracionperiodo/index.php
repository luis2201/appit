<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Configuración</a></li>
      <li class="breadcrumb-item active" aria-current="page">Periodo Lectivo</li>
    </ol>
  </div>

  <div class="container-fluid border-dark">
    <div class="card border-bottom-primary">
    <div class="card-header bg-gradient-primary text-light">
      <h6 class="float-left">Configuración de Periodo Lectivo</h6>
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#periodoModal">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Agregar Periodo
      </button>
    </div>
    <div class="card-body">            
      <div class="card mt-2">
        <table id="dataTable" class="table table-stripped">
          <thead>
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Perido</th>
              <th scope="col" class="text-center">Inicio</th>
              <th scope="col" class="text-center">Fin</th>
              <th scope="col" class="text-center">Estado</th>
              <th scope="col" class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $res = Periodo::findAll();
              $i = 1;
              foreach($res as $rpw):
            ?>
            <tr>
            <th class="text-center" scope="row"><?php echo $i++; ?></th>
            <td><?php echo $row->periodo; ?></td>
            <td class="text-center"><?php echo $row->fechainicio; ?></td>
            <td class="text-center"><?php echo $row->fechafin; ?></td>
            <td class="text-center">
              <?php echo ($row->estado) ? '<span class="badge bg-success">ACTIVO</span>' : '<span class="badge bg-danger">DESACTIVADO</span>'; ?>
            </td>
            <td></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="periodoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="periodoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="periodoModalLabel">Registro de Periodo</h5>
      </div>
      <form id="form">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for="periodo">Nombre de Periodo</label>
              <input type="text" class="form-control" id="nomperiodo" name="nomperiodo">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="fechainicio">Fecha Inicio</label>
              <input type="date" class="form-control" id="fechainicio" name="fechainicio">
            </div>
            <div class="col-md-6">
              <label for="fechafin">Fecha Fin</label>
              <input type="date" class="form-control" id="fechafin" name="fechafin">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnCancelar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php'; ?>
<script src="<?php echo DIR; ?>functions/configuracionperiodo.js"></script>
</body>

</html>