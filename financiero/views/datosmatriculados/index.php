<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="pagomatricula">Pagos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pago de Matrícula</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid border-dark">
  <div class="card border-bottom-primary">
    <div class="card-header bg-gradient-primary text-light">
      <h6 class="float-left">Pago de Matrícula</h6>
      <a href="pagomatricula" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-square" aria-hidden="true"></i> Registrar Pago</a>
    </div>
    <div class="card-body">            
      <table id="tbLista" class="table table-stripped">
        <thead>
          <tr class="text-center">
            <th scope="col"># Factura</th>
            <th scope="col" class="text-center">No. Identificación</th>
            <th scope="col" class="text-center">Estudiante</th>
            <th scope="col" class="text-center">Fecha Nac.</th>
            <th scope="col">Fecha Pago</th>
            <th scope="col" class="text-center">Valor Pago</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($pagos as $row):
        ?>
          <tr>
            <td class="text-center"><?php echo $row->numero_factura; ?></td>
            <td class="text-center"><?php echo $row->numero_identificacion; ?></td>
            <td class="text-center"><?php echo $row->estudiante; ?></td>
            <td class="text-center"><?php echo $row->fecha_nacimiento; ?></td>
            <td class="text-center"><?php echo $row->fecha_pago; ?></td>
            <td class="text-center"><?php echo $row->valorpago; ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>      
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<script src="<?php echo DIR; ?>functions/listapago-matricula.js"></script>
</body>

</html>