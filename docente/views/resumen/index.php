<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Calificaciones</a></li>
      <li class="breadcrumb-item active" aria-current="page">Resumen del Periodo</li>
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
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option>
            </select>
          </div>                            
          <div class="col-md-6">
            <label for="idmateria">Materia</label>
            <select name="idmateria" id="idmateria" class="form-select">
              <option value="">-- Seleccione Materia --</option>
            </select>
          </div>
          <div class="col-md-2 mt-2">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false">
            <i class="fas fa-eye"></i> Ver resumen del Parcial
            </button>
          </div>
        </div>
        <div class="row">
      </div>
      <!-- End Parámetros de búsqueda -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">                  
            <div class="modal-body">
              <!-- Tabla de resultados -->
              <div id="reporte">
                <div class="row">
                  <div class="col-12 text-center">
                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                    <h6 class="m-2"><strong>Resumen del Periodo Académico</strong></h6>
                    <h6 style="margin-top: -10px"><?php echo $periodo; ?></h6>
                  </div>
                </div>                
                <div class="row" style="font-size: 12px"> 
                  <div id="nombremateria" class="col-6"></div>
                  <div id="nombredocente" class="col-6"></div>
                </row>
                <div class="row">                  
                  <div class="col-12">
                    <table id="tbCuadro" class="table" cellspacing="0" cellpadding="0" style="border: black 0px solid; font-size: 0.75em; width: 100%;">
                      <thead class="bg-primary text-light text-center">
                        <tr style="height: 30px; font-weight: bold;">
                          <td scope="col" class="text-center align-middle">#</td>
                          <td scope="col" class="text-center align-middle verticalText" rowspan="2">MAT N°</td>
                          <td scope="col" class="text-center align-middle">NOMINA</td>
                          <td scope="col" class="text-center align-middle">P1</td>
                          <td scope="col" class="text-center align-middle">P2</td>
                          <td scope="col" class="text-center align-middle">TOTAL</td>
                          <td scope="col" class="text-center align-middle">SUP</td>
                          <td scope="col" class="text-center align-middle">FINAL</td>                                                    
                          <td scope="col" class="text-center align-middle">%ASIS.</td>
                          <td scope="col" class="text-center align-middle">OBSERVACIÓN</td>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>                  
                </div>
                <div class="row">
                  <div id="firma" class="row text-center mt-5">
                    <strong>Firma del Docente</strong>
                  </div>
                </div>
              </div>
              <!-- End Tabña de resultados -->
            </div>
            <div class="modal-footer">
              <button id="btnImprimir" type="button" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
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
<script src="<?php echo DIR; ?>functions/resumen.js?v=1.5.1"></script>
</body>
<style>
  table {
    border-collapse: collapse;
  }

  #reporte{
    width: 21cm;
    min-height: 29.7cm;
    padding: 1cm;
    margin: 0 auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

</style>
</html>