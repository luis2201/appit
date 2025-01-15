<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:;">Estudiantes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Agregar-Eliminar Materia</li>
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
          <div class="col-md-5">
            <label for="cmbidperiodo">Periodo Académico</label>
            <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
              <?php foreach ($periodos as $row) : ?>
                <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-7">
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option> 
              <?php foreach ($carreras as $row) : ?>
                <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
              <?php endforeach; ?>             
            </select>
          </div>          
        </div>
        <div class="row mt-2">                    
          <div class="col-md-3">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-select">
              <option value="">-- Seleccione Modalidad --</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="idnivel">Nivel</label>
            <select name="idnivel" id="idnivel" class="form-select">
              <option value="">-- Seleccione Nivel --</option>              
            </select>
          </div>
          <div class="col-md-3 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3"></i> Mostrar Estudiantes</button>
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

<!-- Modal -->
<div class="modal fade" id="modalMaterias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalMateriasLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMateriasLabel">Agregar/Eliminar Materias</h5>
        <button type="button" id="btnCerrar" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-2">
              <label for="numero_matricula">Nº Matrícula</label>
              <input type="text" name="numero_matricula" id="numero_matricula" class="form-control" disabled>
          </div>
          <div class="col-md-2">
              <label for="numero_identificacion">Nº Identificación</label>
              <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" disabled>
          </div>
          <div class="col-md-8">
              <label for="nombreestudiante">Apellidos y Nombres</label>
              <input type="text" name="nombreestudiante" id="nombreestudiante" class="form-control" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <label for="carrera">Carrera</label>            
            <input type="text" name="carrera" id="carrera" class="form-control" value="<?php echo $row->carrera; ?>" disabled>
          </div>
          <div class="col-md-2">
            <label for="nivel">Semestre</label>
            <input type="text" name="nivel" id="nivel" class="form-control" value="<?php echo $row->nivel; ?>" disabled>
          </div>
        </div>
        <div id="tbMaterias" class="row" style="height:25%">
        
        </div>
      </div>      
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/estudiante-materia.js?v=1.2.0"></script>
</body>

</html>