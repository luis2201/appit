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
          <div class="col-md-5">
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
          <div class="col-md-7">
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option>              
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
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar Cuadro</button>
          </div>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->        
      <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
            <div class="modal-body">
              <div id="cuadro">
                <div class="row">
                  <div class="col-12 mb-2 text-center">
                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                    <h6 class="m-2"><strong>Cuadro General</strong></h6>
                    <h6 id="nombreperiodo" style="margin-top: -10px"></h6>
                  </div>
                </div>
                <div class="row" style="margin-top: -10px">
                  <div class="col-6">
                    <p id="carrera"></p>
                  </div>
                  <div class="col-6">
                    <p id="semestre"></p>
                  </div>                  
                </div>
                <div id="reporte">
                  
                </div>
                <div id="firma" class="text-center" style="margin-top: 30px;">
                  <strong>SECRETARIA</strong>
                </div>
              </div>
            </div>
            <div id="modal-footer" class="modal-footer">
              <button type="button" id="btnImprimir" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
              <button id="btnCerrar" type="button" id="btnCerrar" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
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
<script src="<?php echo DIR; ?>functions/cuadro-general.js?v=1.0.3"></script>
</body>

</html>