<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Módulo Introductorio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Materias del Perfil Introductorio</li>
    </ol>
  </div>

  <div class="container-fluid border-dark">
    <div class="card border-bottom-primary">
      <div class="card-header bg-gradient-primary text-light">
        <h6 class="float-left">Materias del Perfil Introductorio</h6>
        <button id="btnAgregar" class="btn btn-success float-end"><i class="fas fa-plus"></i> Agregar/Modificar Materias del Perfil</button>
      </div>
      <div class="card-body">
        <div class="card mt-2 p-2">
          <table id="tbLista" class="table table-stripped" style="width:100%">
            <thead>
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Carrera</th>
                <th scope="col" class="text-center">Materia Introductorio</th>
                <th scope="col" class="text-center">Materia del Perfil</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach($materiasperfil as $row): ?>
                <tr>
                  <td style="width:5%"><?php echo $i++; ?></td>
                  <td style="width:30%"><?php echo $row->carrera; ?></td>
                  <td style="width:35%"><?php echo $row->materiaintroductorio; ?></td>
                  <td style="width:30%"><?php echo $row->materiaperfil; ?></td>
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

<!-- Modal  Materia -->
<div class="modal fade" id="materiaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="materiaModalLabel">Registro de Materias Introductorio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="cerrar();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" id="idperfil" name="idperfil" value="0">
                <div class="col">
                    <label for="idcarrera">Carrera</label>
                    <select name="idcarrera" id="idcarrera" class="form-select">
                        <option value="">-- Seleccione Carrera --</option>
                        <?php foreach($carreras as $row): ?>
                            <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="idmateria_introductorio">Materia Introductorio</label>
                    <select name="idmateria_introductorio" id="idmateria_introductorio" class="form-select">
                        <option value="">-- Seleccione Materia Introductorio --</option>                        
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                  <label >Materias</label>
                  <div id="materias" style="overflow:scroll; height:300px">
                    
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">            
            <button type="button" id="btnCerrar" class="btn btn-secondary" data-dismiss="modal" onclick="cerrar();">Cerrar</button>
        </div>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php'; ?>
<script src="<?php echo DIR; ?>functions/materias-perfil.js?v=1.1.8"></script>
</body>

</html>