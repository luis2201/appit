
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
      <h6 class="float-left">Registro Pago de Matrícula</h6>
      <div class="btn-group float-right" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Nuevo Estudiante</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#buscarModal"><i class="fa fa-search" aria-hidden="true"></i> Buscar Estudiante</button>
        <a href="listapagomatricula" class="btn btn-secondary"><i class="fa fa-list" aria-hidden="true"></i> Lista de Pagos</a>
      </div>
    </div>
    <div class="card-body">
      <form id="frmPago">
        <div class="card">
          <input type="hidden" id="idestudiante" name="idestudiante" value="0">
          <div class="form-group col-12">
            <div class="row mb-1">
              <div class="col-md-3">
                <label for="documentoidentificacion" class="form-label">Documento de Identificación</label>
                <select class="form-control" id="documentoidentificacion" name="documentoidentificacion">
                <option value=""></option>  
                <option value="CEDULA">Cédula</option>
                  <option value="PASAPORTE">Pasaporte</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="numeroidentificacion" class="form-label">Número de Identificación</label>
                <input type="text" class="form-control" id="numeroidentificacion" name="numeroidentificacion" />
              </div>
              <div class="col-md-6">
                <label for="estudiante" class="form-label">Apellidos y Nombres</label>
                <input type="text" class="form-control" id="estudiante" name="estudiante" />
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-md-4">
                <label for="idcarrera" class="form-label">Carrera</label>
                <select class="form-select" id="idcarrera" name="idcarrera" onchange="">
                  <option value="">-- Seleccione --</option>
                  <?php 
                    foreach($carreras as $row): 
                      if($row->idcarrera == 4 || $row->idcarrera == 6 || $row->idcarrera == 9 || $row->idcarrera == 15 || $row->idcarrera == 35 || $row->idcarrera == 37 || $row->idcarrera == 38 || $row->idcarrera == 41 || $row->idcarrera == 48 || $row->idcarrera == 49 || $row->idcarrera == 50 || $row->idcarrera == 51 || $row->idcarrera == 53) { 
                  ?>                  
                  <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                  <?php } endforeach; ?>
                </select>
              </div>
              <div class="col-md-3">
                <label for="idnivel" class="form-label">Curso</label>
                <select class="form-select" id="idnivel" name="idnivel" onchange="">
                  <option value="">-- Seleccione --</option>                  
                </select>
              </div>              
              <div class="col-md-3">
                <label for="idseccion" class="form-label">Sección</label>
                <select class="form-select" id="idseccion" name="idseccion" onchange="valorMatricula(this.value);">
                  <option value="">-- Seleccione --</option>                  
                </select>
              </div>
              <div class="col-md-2">
                <label for="modalidad" class="form-label">Modalidad</label>
                <select class="form-select" id="modalidad" name="modalidad" onchange="valorMatricula(this.value);">
                  <option value="">-- Seleccione --</option>                  
                </select>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-md-6">
                <label for="tipo_matricula" class="form-label">Tipo de Matrícula</label>
                <select class="form-select" id="tipo_matricula" name="tipo_matricula" onchange="valorMatricula(this.value);">
                  <option value="">-- Seleccione --</option>
                  <option value="Ordinaria">Ordinaria</option>
                  <option value="Extraordinaria">Extraordinaria</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="valormatricula" class="form-label">Valor Matrícula</label>
                <input class="form-control" id="valormatricula" name="valormatricula" />
              </div>
              <div class="col-md-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input class="form-control" id="saldo" name="saldo" value="0.00" />
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-2">
          <div class="form-group col-12">
            <div class="row mb-1">
              <div class="col-md-3">
                <label for="fechapago" class="form-label">Fecha de Pago</label>
                <input type="date" class="form-select" id="fechapago" name="fechapago" />
              </div>
              <div class="col-md-3">
                <label for="numerofactura" class="form-label">Número de Factura</label>
                <input type="text" class="form-control" id="numerofactura" name="numerofactura" />
              </div>
              <div class="col-md-4">
                <label for="valorpago" class="form-label">Valor Pago</label>
                <input type="number" class="form-control" id="valorpago" name="valorpago" />
              </div>
              <div class="col-md-2">
                <label for=""></label>
                <button id="btnRegistrarPago" type="submit" class="btn btn-primary btn-sm btn-block mt-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Registrar Pago</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <table id="tbPagos" class="table mt-2">
        <thead class="bg-primary text-light">
          <tr>
            <th>Fecha de Pago</th>
            <th>Factura #</th>
            <th>Valor Pagado</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Nuevo Estudiante-->
<div class="modal fade" id="nuevoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoModalLabel">Registro de Estudiante</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="frmNuevo">
        <div class="modal-body">
          <div class="form-group col-12">
            <div class="row mb-1">
              <div class="col-md-6">
                <label for="tipo_identificacion" class="form-label">Tipo Identificación</label>
                <select class="form-select" id="tipo_identificacion" name="tipo_identificacion">
                  <option value="CEDULA">Cédula</option>
                  <option value="PASAPORTE">Pasaporte</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="numero_identificacion" class="form-label">Número de Documento</label>
                <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion" />
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-md-6">
                <label for="apellido1" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" />
              </div>
              <div class="col-md-6">
                <label for="apellido2" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="apellido2" name="apellido2" />
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-md-6">
                <label for="nombre1" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" id="nombre1" name="nombre1" />
              </div>
              <div class="col-md-6">
                <label for="nombre2" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" id="nombre2" name="nombre2" />
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-md-12">
                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                <input type="text" class="form-control" id="correo_electronico" name="correo_electronico" />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Estudiante</button>
        </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal Buscar Estudiante-->
<div class="modal fade" id="buscarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="buscarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="buscarModalLabel">Estudiantes Registrados</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="tbLista" class="table table-striped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">Cédula</th>                            
              <th scope="col" class="text-center">Estudiante</th>              
              <th></th>        
            </tr>
          </thead>
          <tbody>            
          <?php           
            $estudiantes = Estudiante::findAll();            
            foreach($estudiantes as $row):                
          ?>
            <tr id="<?php echo Main::encryption($row->idestudiante); ?>">
              <td><?php echo $row->numero_identificacion; ?></td>
              <td><?php echo $row->apellido1.' '.$row->apellido2.' '.$row->nombre1.' '.$row->nombre2; ?></td>              
              <td class="text-center">
                <?php 
                  $idestudiante = Main::encryption($row->idestudiante); 
                  $idestudiante = "'$idestudiante'";
                  echo '<button class="btn btn-success btn-sm" onclick="seleccionar('.$idestudiante.')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></button>';
                ?>
              </td>
            </tr>  
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Calificaciones -->
<div class="modal fade" id="calificacionesModal" tabindex="-1" aria-labelledby="calificacionesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">   
      <div class="modal-header">
        <h6 id="nombreestudiante"></h6>
        <h6 id="nivelcarrera"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Tabla de resultados -->
        <table id="tbCalificaciones" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
            <thead class="bg-primary text-light text-center">
              <tr>                      
                <td scope="col" class="text-center">CÓDIGO</td>
                <td scope="col" class="text-center">MATERIA</td>
                <td scope="col" class="text-center">P1</td>
                <td scope="col" class="text-center">P2</td>
                <td scope="col" class="text-center">SUPLETORIO</th>
                <td scope="col" class="text-center">TOTAL</th>
                <td scope="col" class="text-center">OBSERVACIÓN</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        <!-- End Tabña de resultados -->
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Modal Calificaciones en Línea -->
<div class="modal fade" id="calificacionesEnLineaModal" tabindex="-1" aria-labelledby="calificacionesEnLineaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">   
      <div class="modal-header">
        <h6 id="nombreestudianteenlinea"></h6>
        <h6 id="nivelcarreraenlinea"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Tabla de resultados -->
        <table id="tbCalificacionesEnLinea" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
            <thead class="bg-primary text-light text-center">
              <tr>                      
              <td scope="col" class="text-center">CÓDIGO</td>
                <td scope="col" class="text-center">MATERIA</td>
                <td scope="col" class="text-center">P1</td>
                <td scope="col" class="text-center">P2</td>
                <td scope="col" class="text-center">SUPLETORIO</th>
                <td scope="col" class="text-center">TOTAL</th>
                <td scope="col" class="text-center">OBSERVACIÓN</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        <!-- End Tabña de resultados -->
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/pago-matricula.js?v=1.0.3"></script>
</body>

</html>