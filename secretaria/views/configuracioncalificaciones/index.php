<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Configuración</a></li>
      <li class="breadcrumb-item active" aria-current="page">Calificaciones</li>
    </ol>
  </div>

  <div class="container-fluid border-dark">
    <div class="card border-bottom-primary">
    <div class="card-header bg-gradient-primary text-light">
      <h6 class="float-left">Configuración Apertura Módulo de Ingreso de Calificaciones</h6>
      <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#periodoModal">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Agregar configuración
      </button> -->
    </div>
    <div class="card-body">            
      <div class="card mt-2">
        <table id="tbLista" class="table table-stripped">
          <thead>
            <tr>
              <th scope="col" class="text-center">Perido Académico</th>
              <th scope="col" class="text-center">Fecha Apertura</th>
              <th scope="col" class="text-center">Fecha Cierre</th>
              <th scope="col" class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="periodoModalLabel">Configuración de Calificaciones</h5>
      </div>
      <form id="form">
        <input id="idconfiguracion" type="hidden" value="">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <label for="idperiodo">Periodo Académico</label>
              <select class="form-select" id="idperiodo" name="idperiodo">
                <?php foreach($periodos as $row): ?>
                  <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="fecha_apertura">Fecha Inicio</label>
              <input type="date" class="form-control" id="fecha_apertura" name="fecha_apertura">
            </div>
            <div class="col-md-6">
              <label for="fecha_cierre">Fecha Fin</label>
              <input type="date" class="form-control" id="fecha_cierre" name="fecha_cierre">
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
<script src="<?php echo DIR; ?>functions/configuracion-calificaciones.js"></script>
</body>

</html>