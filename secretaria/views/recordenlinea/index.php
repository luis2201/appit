<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Record Académico En Línea</a></li>
      <li class="breadcrumb-item active" aria-current="page">Generar Record Académico En Línea</li>
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
          <div class="col-md-3">
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
          <div class="col-md-5">
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option>              
            </select>
          </div>                  
          <div class="col-md-2">
            <label for="idcarrera">Nivel</label>
            <select name="idnivel" id="idnivel" class="form-select">
              <option value="">-- Seleccione Nivel --</option>              
            </select>
          </div>
          <div class="col-md-2 mt-3">
            <button id="btnLista" type="button" class="btn btn-primary btn-sm btn-block mt-3"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar Lista</button>
          </div>        
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->
      <!-- Tabla de resultados -->
      <table id="tbLista" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
        <thead class="bg-primary text-light text-center">
          <tr>
            <td scope="col" class="text-center">#</td>
            <td scope="col" class="text-center">No. Matr</td>
            <td scope="col" class="text-center">CÉDULA</td>
            <td scope="col" class="text-center">APELLIDOS Y NOMBRES</td>
            <td scope="col" class="text-center"></th>            
          </tr>
        </thead>
        <tbody>
                
        </tbody>
      </table>
      <!-- End Tabña de resultados -->

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/record-enlinea.js?v=1.0.1"></script>
<style>
  #certificacion{
    width: 21cm;
    min-height: 29.7cm;
    padding: 0cm;
    margin: 0 auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }
</style>
</body>

</html>