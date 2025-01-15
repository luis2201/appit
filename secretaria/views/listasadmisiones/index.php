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
      <div class="form form-group">
        <div class="row">
          <div class="col-md-3">
            <label for="cmbidperiodo">Periodo</label>
            <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
              <option value="">-- Seleccione Periodo --</option>
              <?php
       
              foreach ($periodosa as $row) :
              ?>
                <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-5">
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
          <div class="col-md-2">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-select">
              <option value="Virtual">Virtual</option>
            </select>
          </div>
          <div class="col-md-2 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar Lista</button>
          </div>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">            
            <div class="modal-body">
              <!-- Tabla de resultados -->
              <div id="tbLista">
                <div class="row">
                  <div class="col-12 mb-2 text-center">
                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                    <h6 class="m-2"><strong>Alumnos Inscritos en Nivelación<nav></nav></strong></h6>
                    <!-- <h6>Semestre: Mayo - Octubre 2024</h6> -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <p id="semestre"></p>
                  </div>
                  <div class="col-6">
                    <p id="carrera"></p>
                  </div>
                </div>
                <table id="" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                  <thead class="bg-primary text-light text-center">
                    <tr>
                      <td scope="col" class="text-center">#</td>
                      <td scope="col" class="text-center">ALUMNOS</td>
                      <td scope="col" class="text-center">CÉDULA</td>
                      <td scope="col" class="text-center">FECHA DE NACIMIENTO</td>
                      <td scope="col" class="text-center">TIPO DE SANGRE</th>
                      <td scope="col" class="text-center">CELULAR</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <!-- End Tabña de resultados -->
            </div>
            <div class="modal-footer">
              <button id="btnCerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button id="btnImprimir" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Lista</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/listas-admisiones.js?v=1.0.7"></script>

</body>

</html>