<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Leccionario</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Actividades Docente</li>
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
            <form id="form">
                <div class="row">
                    <div class="col-md-6">
                        <label for="idcarrera">Carrera</label>
                        <select name="idcarrera" id="idcarrera" class="form-select">
                          <option value="">-- Seleccione Carrera --</option>
                          <?php foreach ($carreras as $row): ?>
                              <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="iddocente">Docente</label>
                        <select name="iddocente" id="iddocente" class="form-select">
                          <option value="">-- Seleccione Docente --</option>
                        </select>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="idmateria">Materia</label>
                        <select name="idmateria" id="idmateria" class="form-select">
                          <option value="">-- Seleccione Materia --</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" style="width:100%; margin-top:30px"><i class="fa fa-search" aria-hidden="true"></i> Mostrar</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="row">
            <div class="container">
                <div class="table-responsive" style="overflow: scroll;">
                    <div class="p-3" id="tabla">
                                
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
<script src="<?php echo DIR; ?>functions/leccionario.js?v=1.0.3"></script>
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