        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Examen de Suficiencia</a></li>
              <li class="breadcrumb-item active" aria-current="page">Registro de Estudiantes</li>
            </ol>
          </div>

        </div>
        <!-- /.container-fluid -->
        <div class="container-fluid border-dark">
          <!-- Begin Form SolicitudMatrícula -->
            <div class="card border-bottom-primary mb-2">
              <div class="card-header bg-primary text-light">
                Registro de Estudiante para el Examen de Suficiencia
              </div>
              <div class="card-body">
                <!-- Begin FormMatricula -->
                <div class="card p-2">
                    <div class="row mb-1">
                        <div class="col-md-12">
                            <label for="cmbidperiodo" class="form-label">Periodo Activo</label>
                            <select class="form-control" id="cmbidperiodo" name="cmbidperiodo">                              
                              <?php foreach($periodos as $row): ?>
                                <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>                        
                </div>
                <!-- End FormMatricula -->
                <!-- Begin Lista de materias -->
                <div  class="card p-4 mt-2">
                  <table id="tbLista" class="table table-bordered table-striped" id="tbLista" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                        <tr>
                            <td class="text-center">No. Matrícula</td>
                            <td class="text-center">Estudiantes</td>
                            <td class="text-center"></td>
                        </tr>
                    </thead>
                    <tbody> 
                    <?php
                      $row = '';
                      $i = 1;
                      foreach($estudiantes as $row){
                          echo '<tr>
                                      <td class="text-center" style="width: 20%">'. $row->idmatricula .'</td>
                                      <td>'. $row->estudiante .'</td>
                                      <td class="text-center" style="width: 20%">';
                                      
                          $idmatricula = $row->idmatricula;
                          $params = [":idmatricula" => $idmatricula];                                
                          $resp = Examensuficiencia::validaInscripcion($params);                                
                                                          
                          if(count($resp)==0){
                              echo '<button id="'. Main::encryption($row->idmatricula) .'" class="btn btn-primary btn-sm" onclick="inscripcion(this.id)">
                                          <i class="fa fa-check" aria-hidden="true"></i> Inscribir
                                          </button>';
                          } else{ 
                              echo '<span class="badge bg-success">Inscrito</span>';
                          } 
                          
                          echo '</td>
                                  </tr>';
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- End Lista de materias -->
              </div>
            </div>
          <!-- End Form SolicitudMatricula -->
        </div>


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="staticBackdropLabel">Nómina de Estudiantes</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>                
                </div>
            </div>
        </div>

  <?php include_once './views/layout/footer.php' ?>
  <script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
  <script src="<?php echo DIR; ?>functions/examen-suficiencia.js?v=1.0.7"></script>
</body>

</html>