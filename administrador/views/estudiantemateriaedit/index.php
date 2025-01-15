<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:;">Estudiantes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Agregar-Modificar Materia</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">
        
    </div>
    <div class="card-body">
        <?php foreach($datos as $row): ?>
        <div class="row">
            <div class="col-md-2">
                <label for="numero_matricula">Nº Matrícula</label>
                <input type="text" name="numero_matricula" id="numero_matricula" class="form-control" value="<?php echo $row->numero_matricula; ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="numero_identificacion">Nº Identificación</label>
                <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" value="<?php echo $row->numero_identificacion; ?>" disabled>
            </div>
            <div class="col-md-8">
                <label for="estudiante">Apellidos y Nombres</label>
                <input type="text" name="estudiante" id="estudiante" class="form-control" value="<?php echo $row->estudiante; ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <label for="carrera">Carrera</label>
                <input type="text" name="carrera" id="carrera" class="form-control" value="<?php echo $row->carrera; ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="nivel">Semestre</label>
                <input type="text" name="nivel" id="nivel" class="form-control" value="<?php echo $row->nivel; ?>" disabled>
            </div>
        </div>
        <?php
                $idperiodo =  $row->idperiodo;
                $idcarrera =  $row->idcarrera;
            endforeach; 
        ?> 

        <table class="table table-condensed table-hover mt-3" style="width: 100%;">
            <thead class="bg-primary text-light text-center">
                <tr>
                    <th>Código</th>
                    <th>Materia</th>
                    <th>nivel</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $param = [":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera];
                    $res = Materia::findMateriaIdCarrera($param);

                    foreach($res as $row):
                ?>
                    <tr>
                        <td class="text-center"><?php echo $row->codigo; ?></td>
                        <td><?php echo $row->materia; ?></td>
                        <td class="text-center"><?php echo $row->nivel; ?></td>
                        <td class="text-center"><?php echo $row->idmateria; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </div>

  <!-- Lista de estudiantes -->
  <div class="row p-4">
    <div class="container" id="tabla">

    </div>
  </div>
  <!-- ./ End Lista de estudiantes -->
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/estudiante-materiaedit.js?v=1.0.0"></script>
</body>

</html>