<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Tutor</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Tutor</li>
    </ol>
  </div>
  <div class="container-fluid border-dark">
    <div class="card border-bottom-primary">
    <div class="card-header bg-gradient-primary text-light">
      <h6 class="float-left">Lista de Tutores</h6>
    </div>
    <div class="card-body">            
      <div class="card mt-2 p-2">
        <div class="container">
          <form id="form" style="padding:5px">
            <div class="row mb-2">
              <div class="col-10">
                  <label for="iddocente">Docente</label>
                  <input type="hidden" id="iddocente" name="iddocente" class="form-control">
                  <input type="text" id="docente" name="docente" class="form-control" disabled>
              </div>
              <div class="col-2 mt-4" style="top: 10px">
                  <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i> Buscar Docente</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 mb-2">
                <label for="idcarrera">Carrera</label>
                <select name="idcarrera" id="idcarrera" class="form-select">
                  <option value="">-- Seleccione Carrera --</option>
                </select>
              </div>
              <div class="col-md-4 mb-2">
                <label for="idseccion">Sección</label>
                <select name="idseccion" id="idseccion" class="form-select">
                <option value="">-- Seleccione Sección --</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 mb-2">
                <label for="modalidad">Modalidad</label>
                <select name="modalidad" id="modalidad" class="form-select">
                  <option value="">-- Seleccione Modalidad --</option>
                </select>
              </div>
              <div class="col-md-5 mb-2">
                <label for="idnivel">Semestre</label>
                <select name="idnivel" id="idnivel" class="form-select">
                  <option value="">-- Seleccione Semestre --</option>
                </select>
              </div>
              <div class="col-md-2 mt-4" style="top:8px">
                <button type="subtmit" class="btn btn-primary btn-block"><i class="far fa-save"></i> Guardar</button>
              </div>
            </div>
          </form>
        </div>
        
        <table id="tbLista" class="table table-stripped">
          <!-- <thead>
            <tr>
              <th scope="col" class="text-center">Cédula</th>
              <th scope="col" class="text-center">Docente</th>
              <th scope="col" class="text-center">Carrera</th>
              <th scope="col" class="text-center">Semestre</th>
              <th scope="col" class="text-center">Seccion</th>
              <th scope="col" class="text-center">Modalidad</th>
              <th scope="col" class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            
          </tbody> -->
        </table>

        <!-- Modal Docente -->
        <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="fas fa-window-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tbListaDocente" class="table table-stripped table-condensed table-hover" style="padding: 0px;">
                      <thead class="text-bg-primary">
                        <tr>
                          <th scope="col" class="text-center">CEDULA</th>
                          <th scope="col" class="text-center">DOCENTE</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $id = 0;
                          foreach($docentes as $row): 
                        ?>
                          <tr id="<?php echo Main::encryption($row->iddocente); ?>">
                            <td class="text-center" style="width: 20%"><?php echo $row->numerodocumento; ?></td>
                            <td><?php echo $row->apellido1.' '.$row->apellido2.' '.$row->nombre1.' '.$row->nombre2; ?></td>
                            <td class="text-center"  style="width: 10%"><button id="<?php echo Main::encryption($row->iddocente); ?>" class="btn btn-primary bt-sm" data-dismiss="modal" onclick="seleccionar(this.id)"><i class="fas fa-plus-circle"></i></button></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

</div>
<!-- End of Main Content -->

<?php include_once './views/layout/footer.php'; ?>
<script src="<?php echo DIR; ?>functions/tutor.js"></script>
</body>

</html>