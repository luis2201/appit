<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Introductorio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Resumen de Calificaciones Introductorio</li>
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
        <input type="hidden" id="iddocente" value="<?php echo Main::encryption($_SESSION['idusuario_appit']); ?>">
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
          <div class="col-md-2 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false">
            Ver calificaciones
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
                <div class="row" style="width:100%">
                  <div class="col-12 mb-2 text-center">
                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                    <h6 class="m-2"><strong>Alumnos Matriculados</strong></h6>
                    <h6 id="nombreperiodo" style="margin-top: -10px"></h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <p id="docente" style="font-size:15px"><strong>DOCENTE: </strong><?php echo $_SESSION["nombres_appit"]; ?></p>
                  </div>
                  <div class="col-6" style="font-size:15px">
                    <p id="materia"></p>
                  </div>                  
                </div>                
                <table id="tbCuadro" class="table table-stripped table-responsive ajuste" width="100%" cellspacing="0" cellpadding="0" style="font-size:0.75vw; margin-top: -20px;">
                  <thead class="bg-primary text-light text-center">
                    <tr style="height: 20px; font-weight: bold;">
                      <td scope="col" class="text-center align-middle" rowspan="2">#</td>
                      <td scope="col" class="text-center align-middle verticalText" rowspan="2">MAT. N°</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">NOMINA</td>
                      <td scope="col" class="text-center" colspan="2">DOCENCIA (15pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>DOCENCIA</td>
                      <td scope="col" class="text-center" rowspan="2">PRACTICAS<br>APLICACIÓN<br>EXPERIMENT.<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>PRACTICAS</td>
                      <td scope="col" class="text-center" rowspan="2">ACTIVIDADES<br>APRENDIZAJE<br>AUTONOMO<br>(10pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>AAU</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">RESULTADOS<br>(15pts)</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>RESULTADOS</td>
                      <td scope="col" class="text-center align-middle" rowspan="2">TOTAL</th>
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
              <!-- End Tabla de resultados -->              
            </div>
            <div class="modal-footer">                            
              <button type="button" id="btnImprimir" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
            </div>
          </div>
        </div>   
              <div class="position-absolute top-0 end-0 p-3" id="toastContainer">
                <div class="toast" id="myToast" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header bg-success text-light">
                    <strong class="mr-auto">Registro de calificación</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="toast-body">
                    Calificación registrada satisfactoriamente
                  </div>
                </div>
          </div>
      </div>
      
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!-- Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/resumen-introductorio.js?v=1.0.2"></script>
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