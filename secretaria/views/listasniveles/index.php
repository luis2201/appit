<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Listas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Listas por Niveles y Carreras</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->
<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">

    </div>
    <div class="card-body">
      <!-- Parámetros de búsqueda -->
      <div class="form form-group">
        <div class="row">
          <div class="col-md-8">
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option>
              <?php
              foreach ($carreras as $row) :
              ?>
                <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="idseccion">Sección</label>
            <select name="idseccion" id="idseccion" class="form-select">              
                <option value="">-- Seleccione Seción --</option>              
            </select>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-3">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-select">
              <option value="">-- Seleccione Modalidad --</option>              
            </select>
          </div>
          <div class="col-md-5">
            <label for="idnivel">Nivel</label>
            <select name="idnivel" id="idnivel" class="form-select">
                <option value="">-- Seleccione Nivel --</option>              
            </select>
          </div>
          <div class="col-md-4 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar Lista</button>
          </div>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">            
            <div class="modal-body">
              <!-- Tabla de resultados -->
              <div id="Lista">
                <div class="row">
                  <div class="col-12 mb-2 text-center">
                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                    <h6 class="m-2"><strong>Alumnos Matriculados</strong></h6>
                    <h6>Periodo Académico: Noviembre 2023-Abril 2024</h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <p id="carrera"></p>
                  </div>
                  <div class="col-3">
                    <p id="semestre"></p>                    
                  </div>
                  <div class="col-3">                    
                    <p id="seccion"></p>
                  </div>             
                </div>
                <table id="tbLista" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="font-size:11px">
                  <thead class="bg-primary text-light text-center">
                    <tr>
                      <td scope="col" class="text-center">#</td>
                      <td scope="col" class="text-center">No. Matr</td>
                      <td scope="col" class="text-center">ALUMNOS</td>
                      <td scope="col" class="text-center">CÉDULA</td>
                      <td scope="col" class="text-center">FECHA DE NACIMIENTO</td>
                      <td scope="col" class="text-center">TIPO DE SANGRE</th>
                      <td scope="col" class="text-center">CELULAR</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table> 
                <div class="col" id="piepagina" style="margin-top:50px;">
                  <p class="text-center"style="font-size:13px">Ing. Andrea Vinces</p>
                  <p class="text-center" style="margin-top:-20px;font-size:13px; font-weight:bold;">SECRETARIA ACADEMICA</p>
                  <p id="fechaactual" align="right" style="font-size:13px; margin-bottom:20px;">
                <?php 
                    $fecha_actual = date("d-m-Y h:i:s");
                    $fechaComoEntero = strtotime($fecha_actual);
                    $anio = date("Y", $fechaComoEntero);
                    $mes = date("m", $fechaComoEntero);
                    $dia = date("d", $fechaComoEntero);

                    switch($mes)
                    {   
                        case "01":
                            $mes = "Enero";
                            break;

                        case "02":
                            $mes = "Febrero";
                            break;

                        case "03":
                            $mes = "Marzo";
                            break;

                        case "04":
                            $mes = "Abril";
                            break;

                        case "05":
                            $mes = "Mayo";
                            break;

                        case "06":
                            $mes = "Junio";
                            break;

                        case "07":
                            $mes = "Julio";
                            break;

                        case "08":
                            $mes = "Agosto";
                            break;

                        case "09":
                            $mes = "Septiembre";
                            break;

                        case "10":
                            $mes = "Octubre";
                            break;

                        case "11":
                            $mes = "Noviembre";
                            break;

                        case "12":
                            $mes = "Diciembre";
                            break;
                    }
                ?>
                Portoviejo, <?php echo $dia ?> de <?php echo $mes ?> de <?php echo $anio ?>
              </p>
                </div>
              </div>
              <!-- End Tabña de resultados -->
            </div>
            <div class="modal-footer">
              <button id="btnCerrar" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button id="btnImprimir" type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Lista</button>              
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/listas-niveles.js"></script>

</body>

</html>
