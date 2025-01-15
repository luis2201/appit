<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Promoción</a></li>
      <li class="breadcrumb-item active" aria-current="page">Certificado de Promoción</li>
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
              foreach ($periodos as $row) :
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
          <div class="col-md-3">
            <label for="idseccion">Sección</label>
            <select name="idseccion" id="idseccion" class="form-select">
              <option value="">-- Seleccione Sección --</option>
              <!-- <?php
              foreach ($secciones as $row) :
              ?>
                <option value="<?php echo Main::encryption($row->idseccion); ?>"><?php echo $row->seccion; ?></option>
              <?php endforeach; ?> -->
            </select>
          </div>
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
            <button id="btnLista" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar Lista</button>
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

      <!-- Modal -->
      <div class="modal fade" id="calificacionesModal" tabindex="-1" aria-labelledby="calificacionesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">   
            <div class="modal-body">
              <div id="certificacion">
                <div id="encabezadoreporte" class="row">
                  <img src="<?php DIR; ?>img/banner-secretaria.png" alt="" style="width: 100%;">
                  <div class="col-12 mb-2 text-center">
                </div>
                <div class="row">
                  <div class="col-11" style="margin: auto">
                    <p class="fs-3 fw-bold mt-5 text-center">CERTIFICADO DE PROMOCIÓN</p>
                    <p class="text-justify mt-5">CERTIFICO QUE el señor <strong id="estudiante"></strong>, portador(a) de la
                    cédula de identidad número <strong id="numeroidentificacion"></strong>, estudiante de <strong id="nombrenivel"></strong>
                    de la carrera de <strong id="nombrecarrera"></strong>, <strong>INSTITUTO SUPERIOR TECNOLÓGICO PORTOVIEJO</strong>, con el número de matrícula <strong id="numeromatricula"></strong>,
                    obtuvo las siguientes calificaciones en el <strong id="nombreperiodo"></strong> según constan en el libro de registro de notas a mi
                    cargo.</p>
                    <p class="mt-3">El detalle de las calificaciones es el siguiente:</p>

                    <table id="tbCalificaciones" class="table tabled-condensed table-stripped mt-3"cellspacing="0" role="grid" aria-describedby="dataTable_info" style="font-size:0.85em; display: none; width:100%; margin: auto;">
                      <thead class="bg-primary text-light text-center">
                        <tr>                      
                          <td scope="col" class="text-center">CÓDIGO</td>
                          <td scope="col" class="text-center">MATERIA</td>
                          <td scope="col" class="text-center">P1</td>
                          <td scope="col" class="text-center">P2</td>
                          <td scope="col" class="text-center">SUPLETORIO</th>
                          <td scope="col" class="text-center">TOTAL</th>
                          <td scope="col" class="text-center">OBSERVACIÓN</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>

                    <table id="tbCalificacionesEnLinea" class="table tabled-condensed table-stripped mt-3" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="font-size:0.85em; display:none; width:100%; margin: auto;">
                      <thead class="bg-primary text-light text-center">
                        <tr>                      
                          <td scope="col" class="text-center">CÓDIGO</td>
                          <td scope="col" class="text-center">MATERIA</td>
                          <td scope="col" class="text-center">TOTAL</th>
                          <td scope="col" class="text-center">OBSERVACIÓN</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>

                    <p id="fechaactual" class="text-end mt-5"></p>
                            
                            <p class="text-center mt-5">
                              Ab. Alejandro Zambrano Ubillus<br>
                              <strong>SECRETARIO GENERAL</strong>
                            </p>
                            
                            <p class="mt-3">Avm</p>
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="btnImprimir" type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Certificado</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.1"></script>
<script src="<?php echo DIR; ?>functions/promocion.js?v=1.0.1"></script>
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