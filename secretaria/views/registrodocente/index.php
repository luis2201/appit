<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Docentes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Docentes</li>
    </ol>
  </div>

  <div class="container-fluid border-dark">
    <div class="card border-bottom-primary">
    <div class="card-header bg-gradient-primary text-light">
      <h6 class="float-left">Lista de Docentes</h6>
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#docenteModal">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Agregar Docente
      </button>
    </div>
    <div class="card-body">            
      <div class="card mt-2 p-2">
        <table id="tbLista" class="table table-stripped">
          <thead>
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Apellidos</th>
              <th scope="col" class="text-center">Nombres</th>
              <th scope="col" class="text-center">No. Documento</th>
              <th scope="col" class="text-center">Teléfono</th>
              <th scope="col" class="text-center">Correo</th>
              <th scope="col" class="text-center">Estado</th>
              <th scope="col" class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $res = Docente::findAll();
              $i = 1;
              foreach($res as $row):
            ?>
            <tr>
              <th class="text-center" scope="row"><?php echo $i++; ?></th>
              <td><?php echo $row->apellido1.' '.$row->apellido2; ?></td>
              <td><?php echo $row->nombre1.' '.$row->nombre2; ?></td>
              <td class="text-center"><?php echo $row->numerodocumento; ?></td>
              <td class="text-center"><?php echo $row->telefonocelular; ?></td>
              <td class="text-center"><?php echo $row->email; ?></td>
              <td class="text-center">
                <?php echo ($row->estado) ? '<span class="badge bg-success">ACTIVO</span>' : '<span class="badge bg-danger">DESACTIVADO</span>'; ?>
              </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="viewdocente?<?php echo Main::encryption($row->iddocente); ?>" class="btn btn-warning btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  <button type="button" class="btnEliminar btn btn-danger btn-sm float-right" value="<?php echo Main::encryption($row->iddocente); ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </div>
              </td>
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
<div class="modal fade" id="docenteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="docenteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="docenteModalLabel">Registro de Docente</h5>
      </div>
      <form id="form">
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <label for="periodo">Tipo de Documento</label>
              <select class="form-select" id="tipodocumento" name="tipodocumento">
                <option value="">-- Seleccione --</option>
                <option value="Cédula">Cédula</option>
                <option value="Pasaporte">Pasaporte</option>  
              </select>
            </div>
            <div class="col-6">
              <label for="periodo">Número de Identificación</label>
              <input type="text" class="form-control" id="numerodocumento" name="numerodocumento">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="apellido1">Primer Apellido</label>
              <input type="text" class="form-control" id="apellido1" name="apellido2">
            </div>
            <div class="col-md-6">
              <label for="apellido2">Segundo Apellido</label>
              <input type="text" class="form-control" id="apellido2" name="apellido2">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="nombre1">Primer Nombre</label>
              <input type="text" class="form-control" id="nombre1" name="nombre1">
            </div>
            <div class="col-md-6">
              <label for="nombre2">Segundo Nombre</label>
              <input type="text" class="form-control" id="nombre2" name="nombre2">
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
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/registro-docente.js?v=1.0.2"></script>
</body>

</html>