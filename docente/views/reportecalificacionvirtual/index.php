<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Calificaciones</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Calificaciones Virtuales</li>
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
              <?php foreach($carreras as $row): ?>
                <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-2">
            <label for="idnivel">Curso</label>
            <select name="idnivel" id="idnivel" class="form-select">
              <option value="">-- Seleccione Curso --</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="idmateria">Materia</label>
            <select name="idmateria" id="idmateria" class="form-select">
              <option value="">-- Seleccione Materia --</option>
            </select>
          </div>
          <div class="col-md-2 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false">
            <i class="fa fa-eye" aria-hidden="true"></i> Ver Reporte
            </button>
          </div>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">            
            <div class="modal-body">
              <!-- Tabla de resultados -->
              <div id="reporte">
                <div class="row">
                  <div class="col-12 mb-2 text-center">
                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                    <h6 class="m-2"><strong>Alumnos Matriculados</strong></h6>
                    <h6 style="margin-top: -10px">Periodo Académico: Noviembre 2022-Abril 2023</h6>
                  </div>
                </div>
                <div class="row" style="font-size:0.8em;">
                  <div class="col-3">
                    <p id="docente"><strong>DOCENTE: </strong><?php echo $_SESSION["nombres_appit"]; ?></p>
                  </div>
                  <div class="col-3">
                    <p id="materia"></p>
                  </div>
                  <div class="col-2">
                    <p id="semestre"></p>
                  </div>
                  <div class="col-4">
                    <p id="carrera"></p>
                  </div>
                </div>
                <table id="tbCuadro" class="table table-stripped table-responsive" width="100%" cellspacing="0" cellpadding="0" style="margin-top: -20px;">
                  <thead class="bg-primary text-light text-center" style="font-size:0.85em;>
                    <tr style="height: 20px; font-weight: bold;">
                      <td scope="col" class="text-center align-middle" rowspan="2" style="width: 5%;">#</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2" style="width: 5%;">MAT. N°</td>
                      <td scope="col" class="text-center align-middle" rowspan="2" style="width: 50%;">NÓMINA</td>
                      <td scope="col" class="text-center" colspan="2">DOCENCIA (20pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>DOCENCIA</td>
                      <td scope="col" class="text-center" style="width: 100px" rowspan="2">PRACTICAS DE<br>APLICACIÓN Y<br>EXPERIMENTACIÓN<br>(20pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>PRACTICAS</td>
                      <td scope="col" class="text-center" style="width: 100px" rowspan="2">ACTIVIDADES DE<br>APRENDIZAJE<br>AUTONOMO<br>(30pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>AAU</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">RESULTADOS (30pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>RESULTADOS</th>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL</th>
                    </tr>
                    <tr style="font-weight: bold;">
                      <td scope="col" class="text-center" style="width: 100px">Aporte<br>(10pts)</td>
                      <td scope="col" class="text-center" style="width: 100px;">Lecciones<br>(10pts)</td>
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
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/reportecalificacion-virtual.js"></script>
</body>
<style>
    table {
        border: #000 1px solid;
        font-size: 0.70em;
    }
    
    td, th {
        border: black 1px solid;
    }
    tr td:last-child{
        width:1%;
    }

    #reporte{
        width: 29.7;
        min-height: 21cm;
        padding-right: 1cm;
        padding-left: 1cm;
        margin: 0 auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
</style>
</style>
</html>