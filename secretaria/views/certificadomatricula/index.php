<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Matrícula</a></li>
      <li class="breadcrumb-item active" aria-current="page">Certificado de Matrícula</li>
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
          <div class="col-md-6">
            <label for="cmbidperiodo">Periodo</label>
            <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
              <option value="">-- Seleccione Periodo --</option>
              <?php
              foreach ($periodo as $row) :
              ?>
                <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option>
              <?php
              foreach ($carreras as $row) :
              ?>
                <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <!-- <div class="col-md-3">
            <label for="idseccion">Sección</label>
            <select name="idseccion" id="idseccion" class="form-select">
              <option value="">-- Seleccione Sección --</option>
            </select>
          </div> -->
        </div>
        <div class="row mt-2">
          <div class="col-md-3">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-select">
              <option value="">-- Seleccione Modalidad --</option>
              <option value="Presencial">Presencial</option>
              <option value="Virtual">Virtual</option>
            </select>
          </div>
          <div class="col-md-5">
            <label for="idcarrera">Nivel</label>
            <select name="idnivel" id="idnivel" class="form-select">
              <option value="">-- Seleccione Nivel --</option>
              <?php
              foreach ($niveles as $row) :
              ?>
                <option value="<?php echo Main::encryption($row->idnivel); ?>"><?php echo $row->nivel; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3"></i> Mostrar Lista</button>
          </div>
        </div>
        <div class="row mt-2">
          <table id="tbLista" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
            <thead class="bg-primary text-light text-center">
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">No. Matr</th>
                <th scope="col" class="text-center">ALUMNOS</th>
                <th scope="col" class="text-center">CÉDULA</th> 
                <th scope="col" class="text-center">CERTIFICADO</th>            
              </tr>
            </thead>
            <tbody>
                
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/certificado-matricula.js?v=2.0.1"></script>

</body>

</html>