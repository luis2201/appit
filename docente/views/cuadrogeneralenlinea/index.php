<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Cuadros de Notas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cuadro General En Línea</li>
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
                <label for="idcarrera">Carrera</label>
                <select name="idcarrera" id="idcarrera" class="form-select">
                <option value="">-- Seleccione Carrera --</option>
                <?php
        
                $carreras = Carrera::findCarreraEnLineaDocenteTutor($idperiodo, $_SESSION['idusuario_appit']);
                foreach ($carreras as $row) :
                ?>
                    <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="idnivel">Semestre</label>
                <select name="idnivel" id="idnivel" class="form-select">
                    <option value="">-- Seleccione Semestre --</option>
                </select>
            </div>           
            <div class="col-md-2 mt-3">
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
                    <h6 style="margin-top: -10px">Periodo Académico: Mayo - Octubre 2024</h6>
                  </div>
                </div>
                <div class="row" style="margin-top: -10px; font-size:12px;">
                  <div class="col-4">
                    <p id="carrera"></p>
                  </div>
                  <div class="col-4">
                    <p id="semestre"></p>
                  </div>
                  <div class="col-4">
                    <p id="seccion"></p>
                  </div>
                </div>
                <div id="reporte">
                  
                </div>
                <div id="firma" class="text-center" style="margin-top: 30px;">
                  <strong>SECRETARIA</strong>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnImprimir" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
              <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/cuadrogeneral-enlinea.js?v=1.0.1"></script>

</body>

</html>