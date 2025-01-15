      <!-- Begin Page Content -->
      <div class="container-fluid">

       <!-- Page Heading -->
       <div aria-label="breadcrumb">
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="solicitudmatricula">Solicitud de Matrícula</a></li>
         <li class="breadcrumb-item active" aria-current="page">Datos de Matrícula y Materias</li>
        </ol>
       </div>

      </div>
      <!-- /.container-fluid -->

      <div class="container-fluid border-dark">
       <div class="card border-bottom-primary">
        <div class="card-header bg-gradient-primary text-light">
          <h6 class="float-left">Datos de Matrícula</h6>
          <a type="button" href="solicitudmatricula" class="btn btn-sm text-light float-right"><i class="fa fa-chevron-circle-left"></i> Volver</a>
        </div>
        <div class="card-body">            
         <div class="card">
         <?php foreach ($datosmatricula as $row) : ?>
          <div class="form-group col-12">
           <div class="row mb-1">
            <div class="col-md-2">
             <label for="idmatricula" class="form-label">Matrícula #</label>             
             <input type="text" class="form-control text-center" id="idmatricula" name="idmatricula" value="<?php echo $row->idmatricula; ?>" />
            </div>
            <div class="col-md-4">
             <label for="estudiante" class="form-label">Estudiante</label>             
             <input type="text" class="form-control" id="estudiante" name="estudiante" value="<?php echo $row->estudiante; ?>" />
            </div>
            <div class="col-md-6">
             <label for="carrera" class="form-label">Carrera</label>
             <input type="text" class="form-control" id="carrera" name="carrera" value="<?php echo $row->carrera; ?>" />
            </div>
           </div>
           <div class="row mb-1">
            <div class="col-md-4">
             <label for="nivel" class="form-label">Nivel</label>
             <input type="text" class="form-control" id="nivel" name="nivel" value="<?php echo $row->nivel; ?>" />
            </div>
            <div class="col-md-4">
             <label for="seccion" class="form-label">Seccion</label>
             <input type="text" class="form-control" id="seccion" name="seccion" value="<?php echo $row->seccion; ?>" />
            </div>
            <div class="col-md-4">
             <label for="modalidad" class="form-label">Modalidad</label>
             <input type="text" class="form-control" id="modalidad" name="modalidad" value="<?php echo $row->modalidad; ?>" />              
            </div>            
           </div>
          </div>
         <?php endforeach; ?>
         </div>
         <div class="card mt-2">
         	<table id="dataTable" class="table table-stripped">
         		<thead>
         			<tr>
                <th scope="col">Materia</th>
                <th scope="col" class="text-center">Nivel</th>
                <th scope="col" class="text-center">Estado</th>
                <th scope="col" class="text-center"></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($detallematricula as $row):?>
              <tr>
                  <td><?php echo $row->codigo.' '.$row->materia; ?></th>
                  <td class="text-center"><?php echo $row->nivel; ?></td>
                  <td class="text-center">
                    <?php 
                      $iddetalle_matricula = Main::encryption($row->iddetalle_matricula);
                      $iddetalle_matricula = "'$iddetalle_matricula'";
                      echo ($row->estado == 'P')?'<button type="button" class="btn btn-sm btn-warning" onclick="cambioEstado('.$iddetalle_matricula.');">Pendiente</button>':'<span class="badge bg-success">Aprobado</span>';
                    ?>					    
                  </td>
                  <td class="text-center">
                    <?php echo '<button type="button" class="btn btn-sm btn-danger" onclick="eliminaMateria('.$iddetalle_matricula.');"><i class="fa fa-trash" aria-hidden="true"></i></button>' ?>
                  </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          <button type="button" id="btnFinalizar" class="btn btn-primary"><i class="fa fa-check-square" aria-hidden="true"></i> Finalizar Proceso</button>
         </div>
        </div>
       </div>
      </div>
    
      <?php include_once './views/layout/footer.php' ?>
      <script src="<?php echo DIR; ?>functions/matricula.js"></script>
      </body>

      </html>