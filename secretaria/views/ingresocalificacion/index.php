<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Calificaciones</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Calificaciones</li>
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
          <div class="col-3">
            <label for="cmbidperiodo">Periodo</label>
            <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
              <option value="">-- Seleccione Periodo --</option>
              <?php 
                foreach($periodos as $row): 
                  if($row->idperiodo == 17 || $row->idperiodo == 21 || $row->idperiodo == 28){
              ?>
                <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
              <?php } endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="idnivel">Curso</label>
            <select name="idnivel" id="idnivel" class="form-select">
              <option value="">-- Seleccione Curso --</option>
            </select>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6">
            <label for="idmateria">Materia</label>
            <select name="idmateria" id="idmateria" class="form-select">
              <option value="">-- Seleccione Materia --</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="idparcial">Parcial</label>
            <select name="idparcial" id="idparcial" class="form-select">
              <option value="">-- Seleccione Parcial --</option>
            </select>
          </div>
          <div class="col-md-3 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false">
              <i class="fas fa-edit"></i> Ingresar calificaciones
            </button>
          </div>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size:80%;">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">            
            <div class="modal-body">
              <!-- Tabla de resultados -->
              <div id="tbLista">
                <div class="row">
                  <div class="col-12 mb-2 text-center">
                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                    <h6 class="m-2"><strong>Alumnos Matriculados</strong></h6>
                    <h6 style="margin-top: -10px">Periodo Académico: Noviembre 2022-Abril 2023</h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <p id="docente"><strong>DOCENTE: </strong><?php echo $_SESSION["nombres_appit"]; ?></p>
                  </div>
                  <div class="col-3">
                    <p id="materia"></p>
                  </div>
                  <div class="col-2">
                    <p id="semestre"></p>
                  </div>
                  <div class="col-2">
                    <p id="seccion"></p>
                  </div>
                  <div class="col-2">
                    <p id="carrera"></p>
                  </div>
                </div>
                <table id="tbCuadro" class="table table-stripped table-responsive" width="100%" cellspacing="0" cellpadding="0" style="font-size:10px; margin-top: -20px;">
                  <thead class="bg-primary text-light text-center">
                    <tr style="height: 20px; font-weight: bold;">
                      <td scope="col" class="text-center align-middle" rowspan="2" style="width: 5%;">#</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2" style="width: 5%;">MAT. N°</td>
                      <td scope="col" class="text-center align-middle" rowspan="2" style="width: 60%;">NOMINA</td>
                      <td scope="col" class="text-center" colspan="2">DOCENCIA (15pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>DOCENCIA</td>
                      <td scope="col" class="text-center" style="width: 100px" rowspan="2">PRACTICAS DE<br>APLICACIÓN Y<br>EXPERIMENTACIÓN<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>PRACTICAS</td>
                      <td scope="col" class="text-center" style="width: 100px" rowspan="2">ACTIVIDADES DE<br>APRENDIZAJE<br>AUTONOMO<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>AAU</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">RESULTADOS (15pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>RESULTADOS</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL</th>
                    </tr>
                    <tr style="font-weight: bold;">
                      <td scope="col" class="text-center" style="width: 100px">Aporte<br>(10pts)</td>
                      <td scope="col" class="text-center" style="width: 100px;">Lecciones<br>(5pts)</td>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
                <div id="firma" class="row text-center mt-5">
                  <strong>Firma del Docente</strong>
                </div>
              </div>
              <!-- End Tabña de resultados -->
            </div>
            <div class="modal-footer">
              <button type="button" id="btnImprimir" class="btn btn-primary d-none"><i class="fas fa-print"></i> Imprimir</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/ingreso-calificacion.js?v=1.0.2"></script>
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