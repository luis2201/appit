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
          <div class="col-md-2">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 mt-2">
            <label for="idmateria">Hora Inicio</label>
            <input type="time" id="horainicio" name="horainicio" class="form-control">
          </div>
          <div class="col-md-2 mt-2">
            <label for="idmateria">Hora Fin</label>
            <input type="time" id="horafin" name="horafin" class="form-control">
          </div>
          <div class="col-md-4 mt-2">
            <label for="idtipoactividad">Tipo de Actividad</label>
            <select name="idtipoactividad" id="idtipoactividad" class="form-select">
              <option value="">-- Seleccione Tipo de Actividad --</option>
            </select>
          </div>
          <div class="col-md-4 mt-2">
            <label for="idsala">Sala de Simulación</label>
            <select name="idsala" id="idsala"class="form-select">
              <option value="">-- Seleccione de Simulación --</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 mt-2">
            <label for="idestudiante">Ayudante de Simulación</label>
            <select name="idestudiante" id="idestudiante"class="form-select">
              <option value="">-- Seleccione Ayudante de Simulación --</option>
            </select>
          </div>
          <div class="col-md-2 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block">
              Agendar Actividad 
            </button>
          </div>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!-- Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/simulaciones.js?v=1.0.2"></script>
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