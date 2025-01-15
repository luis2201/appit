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
      <?php 
        $fechaActual = strtotime(date('Y-m-d'));
  
        $result = Registrocalificacion::validafecha();
        
        foreach($result as $row){
          $fechaApertura = strtotime($row->fecha_apertura);
          $fechaCierre = strtotime($row->fecha_cierre);
          
          // if($fechaApertura<=$fechaActual && $fechaCierre>=$fechaActual){            
      ?>
            
      <div class="alert alert-success text-justify">
        Seleccione la información de los campos que están a continuación, luego de clic en el botón <strong>Ingresar calificaciones</strong>. Para asignar una calificación ubíquese con un
        clic en el casillero del parámetro que desea calificar y digite el valor, Ud. podrá navegar entre los campos con la tecla de tabulación (ubicada arriba del Bloq. Mayús. 
        en el teclado de su computador de escritorio o laptop). <strong>Las calificaciones se guardarán automáticamente conforme las vaya ingresando.</strong>
      </div>
      <!-- Parámetros de búsqueda -->
      <div class="form form-group">
        <div class="row">          
          <div class="col-md-6">
            <label for="idmateria">Materia</label>
            <select name="idmateria" id="idmateria" class="form-select">
              <option value="">-- Seleccione Materia --</option>
              <?php 
                $param = [":idperiodo" => 21, ":iddocente" => $_SESSION["idusuario_appit"]];
                $materias = Materia::findMateriaIdDocente($param);

                foreach($materias as $row): 
              ?>
                <option value="<?php echo Main::encryption($row->idmateria); ?>"><?php echo '(' .$row->codigo.') ' .$row->materia; ?></option>
              <?php endforeach; ?>
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
                <table id="tbCuadro" class="table table-stripped table-responsive ajuste" width="100%" cellspacing="0" cellpadding="0" style="margin-top: -20px;">
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
      
      <?php 
          // } else {

      ?>
      <!-- <div id="mensaje" class="alert alert-danger">
        Módulo de calificaciones cerrado. Para realizar cambios o ingresar nuevas calificaciones deberá realizar la respectiva solicitud en Secretaría.
      </div> -->
      <?php
      //   }
      }
      ?>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!-- Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.1"></script>
<script src="<?php echo DIR; ?>functions/registrocalificacion-virtual.js?v=1.1.4"></script>
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