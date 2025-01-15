<!-- Begin Page Content -->
<?php foreach($mensajes as $row): ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="mensajeria">Mensajes recibidos</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $row->titulo; ?></li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid border-dark ">
  <!-- Begin Form SolicitudMatrícula -->
  <div class="card border-bottom-primary mb-2">
    <div class="card-header bg-primary text-light">
      
    </div>
    <div class="card-body">
      <div class="col-md-8 text-center" style="margin: auto;">
        <div class="card">
          <div class="card-header">
            <h6 class="float-left">De: APPIT - Aplicativo Institucional ITSUP</h6>
            <h6 class="float-right">Fecha: <?php echo $row->fecha; ?></h6>
          </div>
          <div class="card-body text-justify">
            <p>
              <?php echo $row->mensaje; ?>
            </p>
          </div>
        </div>
        <a href="mensajeria" class="btn btn-primary mt-2"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End of Main Content -->

<?php include_once './views/layout/footer.php'; ?>
<script src="<?php echo DIR; ?>functions/mensajeria.js"></script>
</body>

</html>