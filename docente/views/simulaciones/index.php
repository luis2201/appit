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

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!-- Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/simulaciones.js?v=1.0.0"></script>
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