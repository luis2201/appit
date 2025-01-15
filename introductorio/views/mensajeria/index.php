<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Mensajería</a></li>
      <li class="breadcrumb-item active" aria-current="page">Mensajes recibidos</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid border-dark">
  <!-- Begin Form SolicitudMatrícula -->
  <div class="card border-bottom-primary mb-2">
    <div class="card-header bg-primary text-light">
      
    </div>
    <div class="card-body">
      <table id="tbLista" class="table table-bordered table-sm dataTable table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-secondary text-light">
          <tr>
            <td class="text-center"></td>
            <td class="text-center">Remite</td>
            <td class="text-center">Asunto</td>
            <td class="text-center">Fecha</td>
          </tr>
        </thead>
        <tbody>
        <?php
          $resp = Mensajeria::findAll(Main::decryption($_SESSION['idestudiante_appit']));
          foreach($resp as $row):
        ?>
          <tr>
            <th class="text-center">
              <a href="viewmensaje?<?php echo $row->idmensaje; ?>">
                <?php echo ($row->estado==0)?'<i class="fa fa-envelope text-primary" aria-hidden="true"></i>':'<i class="fa fa-envelope-open text-success" aria-hidden="true"></i>'; ?>
              </a>
            </th>
            <th>Admisiones</th>
            <th><?php echo $row->titulo; ?></th>
            <th class="text-center"><?php echo $row->fecha; ?></th>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- End of Main Content -->

<?php include_once './views/layout/footer.php'; ?>
<script src="<?php echo DIR; ?>functions/mensajeria.js"></script>
</body>

</html>