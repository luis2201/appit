<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Asistencia</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Asistencia y del Desarrollo Currricular</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->
<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary text-light">
      <h6  style="font-weight:bold">Registro de Asistencia y del Desarrollo Currricular</h6>
    </div>
    <div class="card-body">
      <?php 
   
          // $fechaActual = strtotime(date('Y-m-d'));
    
          // $result = Registrocalificacion::validafecha();
          
          // foreach($result as $row){
          //   $fechaApertura = strtotime($row->fecha_apertura);
          //   $fechaCierre = strtotime($row->fecha_cierre);
            
          //   if($fechaApertura<=$fechaActual && $fechaCierre>=$fechaActual){            
      ?>
        <!-- Parámetros de búsqueda -->
        <div class="form form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="fecha">Fecha</label>
              <input type="date" id="fecha" name="fecha" class="form-control">
            </div>
            <div class="col-md-10">
              <label for="idmateria">Materia</label>
              <select name="idmateria" id="idmateria" class="form-select">
                
              </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="unidad">Unidad y Tema</label>
              <input type="text" name="unidad" id="unidad" class="form-control">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="actividades">Actividades o Técnicas realizadas</label>
              <input type="text" name="actividades" id="actividades" class="form-control">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="tareas">Tareas para la próxima clase</label>
              <input type="text" name="tareas" id="tareas" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
                <button id="btnGuardar" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false" style="margin-top:25px!Important">
                  <i class="far fa-save"></i> Registrar / Actualizar Asistencia
                </button>
                <button id="btnEliminar" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false" style="margin-top:25px!Important">
                  <i class="fas fa-calendar-times"></i> Eliminar Asistencia del Curso
                </button>
              </div>
            </div>
        </div>
        <!-- End Parámetros de búsqueda -->

        <div class="card">
          <div class="card-header bg-info">
            
          </div>
          <div class="card-body">
            <!-- Tabla de resultados -->
            <div id="tbLista" class="col-12 table-responsive" style="margin:auto">
              <table id="tbCuadro" class="table table-stripped" width="100%" cellspacing="0" cellpadding="0" style="font-size: 0.8em; margin: auto;">
                <thead class="bg-primary text-light text-center">
                  <tr style="font-weight: bold;">
                    <td scope="col" class="text-center align-middle" rowspan="2" style="width:4%">#</td>
                    <td scope="col" class="text-center align-middle verticalText" rowspan="2" style="width:7%">MAT. N°</td>
                    <td scope="col" class="text-center align-middle" rowspan="2">NOMINA</td>
                    <td scope="col" class="text-center align-middle" colspan="3">% ASISTENCIA</td>
                  </tr>
                  <tr>
                    <td scope="col" class="text-center" style="width:5%">100%</td>
                    <td scope="col" class="text-center align-middle" style="width:5%">50%</td>
                    <td scope="col" class="text-center align-middle" style="width:5%">0%</td>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
            <!-- End Tabña de resultados -->
          </div>
        </div>
            
      </div>
      <?php 
          //} else {

      ?>
      <!-- <div id="mensaje" class="alert alert-danger">
        Módulo de asistencias cerrado.
      </div> -->
      <?php
      //   }
      // }
      ?>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/registro-asistencia.js?v=1.0.9"></script>
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