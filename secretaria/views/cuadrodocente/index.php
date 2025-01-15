<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Calificaciones</a></li>
      <li class="breadcrumb-item active" aria-current="page">Reporte Parcial de Calificaciones</li>
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
            <div class="col">
                <label for="iddocente">Docente</label>
                <select name="iddocente" id="iddocente" class="form-select">
                    <option value="">-- Seleccione Docente --</option>
                    <?php foreach($docentes as $row): ?>
                        <option value="<?php echo Main::encryption($row->iddocente); ?>"><?php echo $row->apellido1.' '.$row->apellido2.' '.$row->nombre1.' '.$row->nombre2; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">          
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
            <i class="fa fa-eye" aria-hidden="true"></i> Mostrar Reporte
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
                    <h6 class="m-2"><strong>Cuadro de calificaciones Parciales</strong></h6>
                    <h6 id="nombreperiodo" style="margin-top: -10px"></h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <p id="docente" style="font-size:15px"><strong>Docente: </strong><?php echo $_SESSION["nombres_appit"]; ?></p>
                  </div>
                  <div class="col-6" style="font-size:15px">
                    <p id="materia"></p>
                  </div>
                  <div class="col-2" style="font-size:15px">
                    <p id="nombreparcial"></p>
                  </div>
                </div>
                <table id="tbCuadro" class="table table-stripped table-responsive" width="100%" cellspacing="0" cellpadding="0" style="font-size:0.8vw; margin-top: -20px;">
                  <thead class="bg-primary text-light text-center">
                    <tr style="height: 20px; font-weight: bold;">
                      <td scope="col" class="text-center align-middle" rowspan="2">#</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">MAT. N°</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">NOMINA</td>
                      <td scope="col" class="text-center align-middle verticalText" colspan="2">DOCENCIA (15pts)</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">TOTAL<br>DOCENCIA</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">PRACTICAS<br>APLICACIÓN Y<br>EXPERIMENTACIÓN<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">TOTAL<br>PRACTICAS</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">ACTIVIDADES<br>APRENDIZAJE<br>AUTONOMO<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">TOTAL<br>AAU</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">RESULTADOS (15pts)</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">TOTAL<br>RESULTADOS</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">TOTAL</th>
                    </tr>
                    <tr style="font-weight: bold;">
                      <td scope="col" class="text-center">Aporte<br>(10pts)</td>
                      <td scope="col" class="text-center">Lecciones<br>(5pts)</td>
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
              <button type="button" id="btnImprimir" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
              <button id="btnCerrar" type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
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
<script src="<?php echo DIR; ?>functions/cuadro-docente.js?v=1.0.2"></script>
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