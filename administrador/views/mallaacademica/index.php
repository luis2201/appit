<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:;">Materias</a></li>
      <li class="breadcrumb-item active" aria-current="page">Malla Académica</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">

    </div>
    <div class="card-body">
      <!-- Parámetros de búsqueda -->
      <div class="form form-group">
        <div class="row">
          <div class="col-md-4">
            <label for="cidperiodo">Periodo Académico</label>
            <select name="idperiodo" id="idperiodo" class="form-select">
              <?php foreach ($periodos as $row) : ?>
                <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option>
              <?php foreach ($carreras as $row) : ?>
                <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-2">
            <label for="idnivel">Nivel</label>
            <select name="idnivel" id="idnivel" class="form-select">
              <option value="">-- Seleccione Nivel --</option>
            </select>
          </div>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->
    </div>
  </div>

  <!-- Lista de estudiantes -->
  <div class="row p-4">
    <div class="container" id="tabla">

    </div>
  </div>
  <!-- ./ End Lista de estudiantes -->
</div>

<!-- Modal para Agregar Materia -->
<div id="modalMateria" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Materia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarMateria()"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="listaMaterias" class="col">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/malla-academica.js?v=1.1.8"></script>
</body>

</html>