  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Asistencia</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reporte de Asistencia por Materia</li>
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
          <div class="row">
            <div class="col-md-5">
              <label for="idcarrera">Carrera</label>
              <select name="idcarrera" id="idcarrera" class="form-select" style="font-size:0.8em">
                <option value="">-- Seleccione Carrera --</option>
                <?php foreach($carreras as $row): ?>
                  <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                <?php endforeach; ?>
              </select>
            </div>                                  
            <div class="col-md-6">
              <label for="idmateria">Materia</label>
              <select name="idmateria" id="idmateria" class="form-select" style="font-size:0.8em">
                <option value="">-- Seleccione Materia --</option>
              </select>
            </div>         
            <div class="col-md-1">
              <button id="btnMostrar" type="button" class="btn btn-primary btn-sm" style="margin-top:35px !Important; width:100%" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-eye"></i> Ver
              </button>
            </div>
          </div>  
          <!-- End Parámetros de búsqueda -->
          <div class="row">                      
            <!-- Tabla de resultados -->
            <div class="col-10 mt-3" style="margin:auto">                
              <table id="tbCuadro" class="table table-stripped table-responsive" width="100%" cellspacing="0" cellpadding="0">
                <thead class="bg-primary text-light text-center">
                  <tr style="height: 1em; font-weight: bold;font-size: 0.7em;">
                    <td scope="col" class="text-center align-middle">#</td>
                    <td scope="col" class="text-center align-middle verticalText">MAT. N°</td>
                    <td scope="col" class="text-center align-middle verticalText">CÉDULA</td>
                    <td scope="col" class="text-center align-middle">NOMINA</td>
                    <td scope="col" class="text-center align-middle">DIAS LABORADOS</td>
                    <td scope="col" class="text-center align-middle">TOTAL ASISTENCIAS</td>
                    <td scope="col" class="text-center align-middle">% ASISISTENCIAS</td>
                    <td scope="col" class="text-center align-middle">FALTAS</td>
                  </tr>                
                </thead>
                <tbody>
                  
                </tbody>
              </table>              
            </div>                        
            <!-- End Tabla de resultados -->
          </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
      <div class="modal-content">      
          <div id="header" class="modal-header">
              <h6>Detalle de Faltas por Fecha</h6>
          </div>      
          <div class="modal-body">
              <div class="row">
                  <div class="col">
                      <table id="tbDetalle" class="table">
                        <thead class="bg-primary text-light">
                          <tr>
                            <td>Fecha</td>
                            <td>Detalle</td>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="modal-footer">                  
              <button type="button" id="btnCerrar" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
          </div>
      </div>
      </div>
  </div>
  <!-- Fin Modal -->

  <?php include_once './views/layout/footer.php' ?>
  <!--    Scripts -->
  <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
  <script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
  <script src="<?php echo DIR; ?>functions/reporte-asistencia.js?v=2.1.7"></script>
  </body>
  <style>

    table {
      border: #000 1px solid;
    }
    
    td, th {
      border: black 1px solid;
    }
    tr td:last-child{
      width:1%;
  }
  </style>
  </html>