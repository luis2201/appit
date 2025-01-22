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
              <div class="col-md-10 col-sm-8">
                <div class="row">
                  <div class="col-12">
                    <label for="periodo">Docente</label>
                    <input type="hidden" id="iddocente" name="iddocente">
                    <input type="text" id="docente" name="docente" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="idcarrera">Carrera</label>
                    <select class="form-select" id="idcarrera" name="idcarrera">
                      <option value="">-- Seleccione Carrera --</option>
                      <?php foreach ($carreras as $row) : 
                        if($row->idcarrera == 37 || $row->idcarrera == 38 || $row->idcarrera == 35 || $row->idcarrera == 49 || $row->idcarrera == 15 || $row->idcarrera == 4 || $row->idcarrera == 6 || $row->idcarrera == 9 || $row->idcarrera == 48 || $row->idcarrera == 50 || $row->idcarrera == 51 || $row->idcarrera == 53) { 
                      ?>     
                        <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                      <?php } endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="idnivel">Nivel</label>
                    <select class="form-select" id="idnivel" name="idnivel">
                      <option value="">-- Seleccione Nivel --</option>
                      <?php foreach ($niveles as $row) : ?>
                        <option value="<?php echo Main::encryption($row->idnivel); ?>"><?php echo $row->nivel; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="hidden" id="idmateria" name="idmateria">
                    <label for="materia">Materia</label>
                    <input type="text" class="form-control" id="materia" name="materia">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <label for="idseccion">Sección</label>
                    <select class="form-select" id="idseccion" name="idseccion">
                      <option value="">-- Seleccione Sección --</option>
                      <?php foreach($secciones as $row): ?>
                        <option value="<?php echo Main::encryption($row->idseccion); ?>"><?php echo $row->seccion; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-5">
                    <label for="modalidad">Modalidad</label>
                    <select class="form-select" id="modalidad" name="modalidad">
                      <option value="">-- Seleccione Modalidad --</option>
                      <option value="Presencial">Presencial</option>
                      <option value="Virtual">En línea</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <label for="horas">Número Horas</label>
                    <input type="number" class="form-control" id="horas" name="horas" min="1">
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-sm-2">
                <div class="row mt-2">
                  <div class="col-12">
                    <div class="row">
                      <button type="button" id="btnBuscarD" class="btn btn-info btn-block text-light mt-4"><i class="fa fa-search" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Buscar Docente</button>
                      <button type="button" id="btnBuscarM" class="btn btn-primary btn-block text-light mt-2"><i class="fa fa-search" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Buscar Materia</button>
                      <button type="button" id="btnCancelar" class="btn btn-secondary mt-2" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancelar</button>
                      <button type="submit" class="btn btn-success mt-2"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>Guardar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="card mt-2 p-2">
          <table id="tbLista" class="table table-stripped">
            <thead>
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Carrera</th>
                <th scope="col" class="text-center">Nivel</th>
                <th scope="col" class="text-center">Sección</th>
                <th scope="col" class="text-center">Código</th>
                <th scope="col" class="text-center">Materia</th>
                <th scope="col" class="text-center">Modalidad</th>
                <th scope="col" class="text-center">Horas</th>
                <th scope="col" class="text-center"></th>
              </tr>
            </thead>
            <tbody>
              
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
<script src="<?php echo DIR; ?>functions/carga-horaria.js?v=1.0.1"></script>
</body>

</html>