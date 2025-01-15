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
            <td scope="col" class="text-center">Documento</td>
            <td scope="col" class="text-center">No. Documento</td>
            <td scope="col" class="text-center">Apellidos</td>
            <td scope="col" class="text-center">Nombres</th>
            <td scope="col" class="text-center">Validación</th>
            <td scope="col" class="text-center">Introductorio</th>
          </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($estudiantes as $row): ?>
                <tr>
                    <td scope="col" class="text-center"><?php echo $i++; ?></td>
                    <td scope="col" class="text-center"><?php echo $row->tipo_identificacion; ?></td>
                    <td scope="col" class="text-center"><?php echo $row->numero_identificacion; ?></td>
                    <td scope="col"><?php echo $row->apellido1.' '.$row->apellido2; ?></td>
                    <td scope="col"><?php echo $row->nombre1.' '.$row->nombre2; ?></td>
                    <td class="text-center">
                      <div class="form-check form-switch">
                        <input id="v<?php echo Main::encryption($row->idestudiante); ?>" onchange="validacionEstado(this.id)" class="form-check-input" type="checkbox" <?php echo ($row->validacion)?'checked':''; ?> >
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="form-check form-switch">
                        <input id="i<?php echo Main::encryption($row->idestudiante); ?>" onchange="introductorioEstado(this.id)" class="form-check-input" type="checkbox" <?php echo ($row->introductorio)?'checked':''; ?> >
                      </div>
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
<script src="<?php echo DIR; ?>functions/cambio-tipoestudiante.js?v=1.2.1"></script>
</body>

</html>