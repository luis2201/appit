<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Listas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Listas por Niveles y Carreras</li>
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
      <form id="frm" action="listanivelespdf" method="POST" target="_blank">
      <div class="form form-group">
        <div class="row">
          <div class="col-md-4">
            <label for="cmbidperiodo">Periodo</label>
            <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
              <?php
              foreach ($listaperiodos as $row) :
                $estado = ($row->estado)?'selected':'';
              ?>
                <option value="<?php echo Main::encryption($row->idperiodo); ?>" <?php echo $estado; ?>><?php echo $row->periodo; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-8">
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
        </div>
        <div class="row mt-2">
          <div class="col-md-3">
            <label for="idseccion">Sección</label>
            <select name="idseccion" id="idseccion" class="form-select">              
                <option value="">-- Seleccione Seción --</option>              
            </select>
          </div>
          <div class="col-md-3">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-select">
              <option value="">-- Seleccione Modalidad --</option>              
            </select>
          </div>
          <div class="col-md-3">
            <label for="idnivel">Nivel</label>
            <select name="idnivel" id="idnivel" class="form-select">
                <option value="">-- Seleccione Nivel --</option>              
            </select>
          </div>
          <div class="col-md-3 mt-2">
            <button id="" type="submit" class="btn btn-primary btn-sm btn-block mt-3"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar Lista</button>
          </div>
        </div>
      </div>
      </form>
      <!-- End Parámetros de búsqueda -->

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/listas-niveles.js?v=1.1.0"></script>

</body>

</html>
