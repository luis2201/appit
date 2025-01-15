      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Matrícula</a></li>
            <li class="breadcrumb-item active" aria-current="page">Solicitud de Matrícula</li>
          </ol>
        </div>

      </div>
      <!-- /.container-fluid -->

      <div id="tabla" class="container-fluid border-dark">
        <div class="card border-bottom-primary">
          <div class="card-header bg-gradient-primary text-light">
            Solicitudes de Matrícula
          </div>
          <div class="card-body">
            <table id="tbLista" class="table table-striped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead class="bg-secondary text-light text-center">
                <tr>
                  <td scope="col" class="text-center">ID</td>
                  <td scope="col" class="text-center">Cédula/Pasaporte</td>
                  <td scope="col" class="text-center">Apellidos</td>
                  <td scope="col" class="text-center">Nombres</td>
                  <td scope="col" class="text-center">Correo</td>                  
                </tr>
              </thead>
              <tbody>
                <?php
                $datos = Datosincompletos::findAll();
                foreach ($datos as $row) :
                ?>
                  <tr>
                    <td scope="col"><?php echo $row->idestudiante; ?></td>
                    <td scope="col" class="text-center"><?php echo $row->numero_identificacion; ?></td>
                    <td scope="col"><?php echo $row->apellido1.' '.$row->apellido2; ?></td>
                    <td scope="col"><?php echo $row->nombre1.' '.$row->nombre2; ?></td>
                    <td scope="col"><?php echo $row->correo_electronico; ?></td>                                        
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <?php include_once './views/layout/footer.php' ?>
      <script src="<?php echo DIR; ?>functions/datos-incompletos.js"></script>
      </body>

      </html>