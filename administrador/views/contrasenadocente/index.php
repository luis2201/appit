<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:;">Estudiantes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cambio Tipo de Estudiante</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">

    </div>
    <div class="card-body">
      <!-- Tabla de resultados -->
        <table id="tbLista" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
            <thead class="bg-primary text-light text-center">
            <tr>
                <td scope="col" class="text-center">#</td>
                <td scope="col" class="text-center">No. Documento</td>
                <td scope="col" class="text-center">Apellidos</td>
                <td scope="col" class="text-center">Nombres</td>
                <td scope="col" class="text-center">Contraseña</td>
                <td scope="col" class="text-center"></td>
            </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($docentes as $row): ?>
                    <tr id="<?php echo $row->iddocente; ?>" data-password="<?php echo $row->contrasena; ?>">
                        <td scope="col" class="text-center"><?php echo $i++; ?></td>
                        <td scope="col" class="text-center"><?php echo $row->numerodocumento; ?></td>
                        <td scope="col"><?php echo $row->apellido1.' '.$row->apellido2; ?></td>
                        <td scope="col"><?php echo $row->nombre1.' '.$row->nombre2; ?></td>
                        <td scope="col" class="text-center password-cell"><?php echo $row->contrasena; ?></td>
                        <td class="text-center">
                        <button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- End Tabla de resultados -->
      
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/contrasenadocente.js?v=1.1.4"></script>
</body>

</html>