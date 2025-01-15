<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Docentes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Carga Horaria</li>
    </ol>
  </div>

  <div class="container-fluid border-dark">
    <div class="card border-bottom-primary">
      <div class="card-header bg-gradient-primary text-light">
        <h6 class="float-left">Registro de Carga Horaria</h6>
      </div>
      <div class="card-body">
        <div class="p-1">
          <form id="form">            
            <div class="row">
                <div class="col-6">
                <label for="iddocente">Docente</label>                    
                <select id="iddocente" name="iddocente" class="form-select">
                    <option value="">-- Seleccione Docente --</option>
                    <?php foreach ($docentes as $row): ?>
                        <option value="<?php echo Main::encryption($row->iddocente) ?>"><?php echo $row->apellido1.' '.$row->apellido2.' '.$row->nombre1.' '.$row->nombre2; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="col-4">                    
                <label for="idmodulo">Módulo</label>                    
                <select id="idmodulo" name="idmodulo" class="form-select">
                    <option value="">-- Seleccione Módulo --</option>
                    <?php foreach ($modulos as $row): ?>
                        <option value="<?php echo Main::encryption($row->idmodulo); ?>"><?php echo $row->modulo; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success btn-sm" style="width:100%; margin-top:35px;">
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        Guardar
                    </button>
                </div>            
            </div>
          </form>
        </div>
        <div class="card mt-2 p-2">
          <table id="tbLista" class="table table-stripped">
            <thead>
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Docente</th>
                <th scope="col" class="text-center">Módulo</th>                
                <th scope="col" class="text-center"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i = 1;
                foreach ($docentemodulos as $row): 
              ?> 
                <tr>
                  <td class="text-center"><?php echo $i++; ?></td>
                  <td><?php echo $row->docente; ?></td>
                  <td><?php echo $row->modulo; ?></td>
                  <td class="text-center">
                    <button id="<?php echo Main::encryption($row->idmodulo_docente); ?>" class="btn btn-danger btn-sm" onclick="eliminar(this.id)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <span id="total" class="badge bg-success mt-2 float-end"></span>
      </div>
    </div>
  </div>

</div>
<!-- End of Main Content -->

<!-- Modal  Docente -->
<div class="modal fade" id="docenteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="docenteModalLabel">Lista de Docentes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <table id="tbDocentes" class="table table-stripped">
            <thead>
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center"># Identificación</th>
                <th scope="col" class="text-center">Apellidos</th>
                <th scope="col" class="text-center">Nombres</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($docentes as $row) : ?>
                <tr id="<?php echo Main::encryption($row->iddocente); ?>">
                  <th scope="row" class="text-center"><?php echo $i++; ?></th>
                  <td class="text-center"><?php echo $row->numerodocumento; ?></th>
                  <td><?php echo $row->apellido1 . ' ' . $row->apellido2; ?></td>
                  <td><?php echo $row->nombre1 . ' ' . $row->nombre2; ?></td>
                  <td><button type="button" class="btn btn-sm btn-success" onclick="agregarDocente('<?php echo Main::encryption($row->iddocente); ?>')"><i class="fa fa-plus-square" aria-hidden="true"></i></button></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  Materia -->
<div class="modal fade" id="materiaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="materiaModalLabel">Lista de Materias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tbMaterias" class="table table-stripped" style="border-style: solid; width: 100%">
          <thead>
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Código</th>
              <th scope="col" class="text-center">Materia</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php'; ?>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/docente-admisiones.js?v=1.0.0"></script>
</body>

</html>