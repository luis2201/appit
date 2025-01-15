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
                  <td scope="col" class="text-center">Estudiante</td>
                  <td scope="col" class="text-center">Carrera</td>
                  <td scope="col" class="text-center">Nivel</th>
                  <td scope="col" class="text-center">Datos</td>
                  <td scope="col" class="text-center">Documentos</td>
                  <td scope="col" class="text-center">Validar</td>
                </tr>
              </thead>
              <tbody style="font-size:0.8em">
                <?php      
                $solicitudes = Solicitudmatricula::findall($idperiodo);
 
                foreach ($solicitudes as $row) :
                ?>
                  <tr>
                    <td scope="col"><?php echo $row->idmatricula; ?></td>
                    <td scope="col" class="text-center"><?php echo $row->numero_identificacion; ?></td>
                    <td scope="col"><?php echo $row->estudiante; ?></td>
                    <td scope="col"><?php echo $row->carrera; ?></td>
                    <td scope="col" class="text-center"><?php echo $row->nivel; ?></th>
                    <td scope="col" class="text-center">
                      <div class="btn-group" role="group" aria-label="Documentos">
                        <button class="btn btn-circle btn-sm btn-warning" onclick="datosEstudiante('<?php echo $row->numero_identificacion; ?>')"><i class="fa fa-eye text-light"></i></button>
                        <a class="btn btn-circle btn-sm btn-secondary" title="Visualizar Foto" href="<?php echo DIR; ?>documento.php?img=<?php echo $row->foto; ?>" target="_blank"><i class="fas fa-camera"></i></a>
                      </div>  
                    </td>
                    <td scope="col" class="text-center">
                      <div class="btn-group" role="group" aria-label="Documentos">
                        <a class="btn btn-circle btn-sm btn-info" title="Visualizar documento de Identificación" href="<?php echo DIR; ?>documentos.php?img=<?php echo $row->doc_cedula; ?>" target="_blak"><i class="fa fa-address-card text-light"></i></a>
                        <a class="btn btn-circle btn-sm btn-info" title="Visualizar Título e Bachiller" href="<?php echo DIR; ?>documentos.php?img=<?php echo $row->doc_titulo; ?>" target="_blank"><i class="fa fa-file text-light" aria-hidden="true"></i></a>
                        <button id="btnInconsistencia" class="btn btn-circle btn-sm btn-dark" title="Inconsistencia de datos" value="<?php echo $row->numero_identificacion; ?>" onclick="inconsistencia(this.value);"><i class="fa fa-exclamation" aria-hidden="true"></i></button>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="btn-group" role="group" aria-label="Validar">
                        <a class="btn btn-sm btn-primary" href="matricula?<?php echo Main::encryption($row->idmatricula); ?>" title="Validar Matrícula"><i class="fa fa-check-square" aria-hidden="true"></i></a>
                        <button id="btnRechazar" class="btn btn-sm btn-danger" title="Rechazar postulación" value="<?php echo $row->idmatricula; ?>" onclick="rechazar(this.value);"><i class="fa fa-ban" aria-hidden="true"></i></button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div id="datos" class="container-fluid border-dark">
        <!-- FORM ADD DATOS ESTUDIANTE-->
          <!-- INFORMACIÓN PERSONAL -->
          <div class="card border-bottom-primary mb-2">
            <div class="card-header bg-gradient-primary text-light">
              <h6 class="float-left">Información Personal</h6>
            </div>
            <div class="card-body">
              <div class="form-group col-12">
                <div class="row">
                  <div class="col-md-4">
                    <label for="tipo_identificacion" class="form-label">Tipo de identificación</label>
                    <select class="form-control" id="tipo_identificacion" name="tipo_identificacion">
                      <option value="CEDULA">Cédula</option>
                      <option value="PASAPORTE">Pasaporte</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="numero_identificacion" class="form-label">Número de identificación</label>
                    <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
                  </div>
                  <div class="col-md-4">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                  </div>
                </div>
              </div>
              <div class="form-group col-12">
                <div class="row">
                  <div class="col-md-3">
                    <label for="apellido1" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido1">
                  </div>
                  <div class="col-md-3">
                    <label for="apellido2" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2">
                  </div>
                  <div class="col-md-3">
                    <label for="nombre1" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="nombre1" name="nombre1">
                  </div>
                  <div class="col-md-3">
                    <label for="nombre2" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="nombre2" name="nombre2">
                  </div>
                </div>
              </div>
              <div class="form-group col-12">
                <div class="row">
                  <div class="col-md-3">
                    <label for="tipo_sangre">Sexo</label>
                    <div class="form-check text-center">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="hombre" value="1">
                        <label class="form-check-label" for="hombre">Hombre</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="mujer" value="0">
                        <label class="form-check-label" for="mujer">Mujer</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="inputPassword4" class="form-label">Género</label>
                    <select class="form-control" id="genero" name="genero">
                      <option value="">-- Seleccione género --</option>
                      <option value="MASCULINO">MASCULINO</option>
                      <option value="FEMENINO">FEMENINO</option>
                                            <option value=" OTRO">OTRO</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="estado_civil" class="form-label">Estado Civil</label>
                    <select class="form-control" id="estado_civil" name="estado_civil">
                      <option value="">-- Seleccione estado civil --</option>
                      <option value="SOLTERO/A">SOLTERO/A</option>
                      <option value="CASADO/A">CASADO/A</option>
                      <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="etnia" class="form-label">Etnia</label>
                    <select class="form-control" id="etnia" name="etnia">
                      <option value="">-- Seleccione etnia --</option>
                      <option value="MESTIZO">MESTIZO</option>
                      <option value="AFROECUATORIANO">AFROECUATORIANO</option>
                      <option value="INDIGENA">INDIGENA</option>
                      <option value="MONTUBIO">MONTUBIO</option>
                      <option value="BLANCO">BLANCO</option>
                      <option value="OTROS">OTROS</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- INFORMACIÓN MÉDICA -->
          <div class="card border-bottom-info mb-2">
            <div class="card-header bg-gradient-info text-light">
              Información Médica
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="tipo_sangre">Tipo de sangre</label>
                    <select class="form-control" id="tipo_sangre" name="tipo_sangre">
                      <option value="">-Seleccione tipo de sangre-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B-</option>
                      <option value="B+">B+</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                    </select>
                  </div>
                  <div class="col-md-2 text-center">
                    <label for="tipo_sangre">Discapacidad</label>
                    <div class="form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="discapacidad" id="discapacidadSI" value="1">
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="discapacidad" id="discapacidadNO" value="0">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label for="tipo_sangre">% discapacidad</label>
                    <input type="number" class="form-control" id="porcentaje_discapacidad" name="porcentaje_discapacidad">
                  </div>
                  <div class="col-md-2 text-center">
                    <label for="tipo_sangre">Carnet CONADIS</label>
                    <div class="form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="carnet_conadis" id="carnet_conadisSI" value="1">
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="carnet_conadis" id="carnet_conadisNO" value="0">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label for="numero_carnet"># carnet CONADIS</label>
                    <input type="text" class="form-control" id="numero_carnet" name="numero_carnet">
                  </div>
                  <div class="col-md-2">
                    <label for="tipo_discapacidad" class="form-label">Tipo Discapacidad</label>
                    <select class="form-control" id="tipo_discapacidad" name="tipo_discapacidad">
                      <option value="">- Seleccione -</option>
                      <option value="AUDITIVA">AUDITIVA</option>
                                                <option value=" FISICA">FISICA</option>
                      <option value="INTELECTUAL">INTELECTUAL</option>
                      <option value="LENGUAJE">LENGUAJE</option>
                      <option value="PSICOSOCIAL">PSICOSICIAL</option>
                      <option value="VIAUL">VISUAL</option>
                      <option value="MULTIPLE">MULTIPLE</option>
                      <option value="NINGUNA">NINGUNA</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- INFORMACIÓN DE CONTACTO -->
          <div class="card border-bottom-secondary mb-2">
            <div class="card-header bg-gradient-secondary text-light">
              Información de Contacto
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="row mb-2">
                  <div class="col-md-3">
                    <label for="idpais_nacionalidad">País de nacionalidad</label>
                    <select class="form-control" name="idpais_nacionalidad" id="idpais_nacionalidad">
                      <option value="">-- Seleccione País --</option>
                      <?php foreach ($paises as $row) : ?>
                        <option value="<?php echo $row->idpais; ?>"><?php echo $row->pais; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="idcanton_nacimiento">Cantón de nacimiento</label>
                    <select class="form-control" name="idcanton_nacimiento" id="idcanton_nacimiento">
                      <option value="">-- Seleccione Cantón --</option>
                      <?php foreach ($ciudades as $row) : ?>
                        <option value="<?php echo $row->idciudad; ?>"><?php echo $row->ciudad; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="idpais_residencia">País de residencia</label>
                    <select class="form-control" name="idpais_residencia" id="idpais_residencia">
                      <option value="">-- Seleccione País --</option>
                      <?php foreach ($paises as $row) : ?>
                        <option value="<?php echo $row->idpais; ?>"><?php echo $row->pais; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="idcanton_residencia">Cantón de residencia</label>
                    <select class="form-control" name="idcanton_residencia" id="idcanton_residencia">
                      <option value="">-- Seleccione Cantón --</option>
                      <?php foreach ($ciudades as $row) : ?>
                        <option value="<?php echo $row->idciudad; ?>"><?php echo $row->ciudad; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="correo_electronico">Correo electrónico</label>
                    <input type="text" class="form-control" id="correo_electronico" name="correo_electronico">
                  </div>
                  <div class="col-md-3">
                    <label for="numero_celular">Número celular</label>
                    <input type="text" class="form-control" id="numero_celular" name="numero_celular">
                  </div>
                  <div class="col-md-3">
                    <label for="tipo_colegio">Tipo Colegio procedencia</label>
                    <select class="form-control" id="tipo_colegio" name="tipo_colegio">
                      <option value="">-- Seleccione colegio --</option>
                      <option value="FISCAL">FISCAL</option>
                      <option value="FISCOMISIONAL">FISCOMISIONAL</option>
                      <option value="PARTICULAR">PARTICULAR</option>
                      <option value="MUNICIPAL">MUNICIPAL</option>
                      <option value="EXTRANJERO">EXTRANJERO</option>
                      <option value="NO REGISTRA">NO REGISTRA</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- INFORMACION ECONOMICA Y FAMILIAR -->
          <div class="card border-bottom-success mb-2">
            <div class="card-header bg-gradient-success text-light">
              Información Económica y Familiar
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="ocupacion">Ocupación</label>
                    <select class="form-control" name="ocupacion" id="ocupacion">
                      <option value="">-- Seleccione ocupación --</option>
                      <option value="TRABAJA">TRABAJA</option>
                      <option value="NO TRABAJA">NO TRABAJA</option>
                      <option value="ESTUDIANTE">ESTUDIANTE</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="ingresos">Ingresos</label>
                    <input type="number" class="form-control" id="ingresos" name="ingresos">
                  </div>
                  <div class="col-md-2">
                    <label for="bono_desarrollo">Bono de desarrollo</label>
                    <div class="form-check">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bono_desarrollo" id="bono_desarrolloSI" value="1">
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bono_desarrollo" id="bono_desarrolloNO" value="0">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label for="nivel_formacionp">Nivel formación del Padre</label>
                    <select class="form-control" name="nivel_formacionp" id="nivel_formacionp">
                      <option value="">-- Seleccione Nivel --</option>
                      <option value="EDUCACION BASICA">EDUCACION BASICA</option>
                      <option value="BACHILLERATO">BACHILLERATO</option>
                      <option value="SUPERIOR">SUPERIOR</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="nivel_formacionm">Nivel formación de la Madre</label>
                    <select class="form-control" name="nivel_formacionm" id="nivel_formacionm">
                      <option value="">-- Seleccione Nivel --</option>
                      <option value="EDUCACION BASICA">EDUCACION BASICA</option>
                      <option value="BACHILLERATO">BACHILLERATO</option>
                      <option value="SUPERIOR">SUPERIOR</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <label for="ingresos_hogar">Ingresos del hogar</label>
                    <input type="number" class="form-control" id="ingresos_hogar" name="ingresos_hogar">
                  </div>
                  <div class="col-md-2">
                    <label for="miembros_hogar">Miembros del hogar</label>
                    <input type="number" class="form-control" id="miembros_hogar" name="miembros_hogar">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col text-center">
            <button id="btnVolver" class="btn btn-primary btn-sm"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver</button>
          </div>
        <!-- FORM ADD DATOS ESTUDIANTE-->
      </div>

      <?php include_once './views/layout/footer.php' ?>
      <script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
      <script src="<?php echo DIR; ?>functions/solicitud-matricula.js?v=1.0.1"></script>
      </body>

      </html>