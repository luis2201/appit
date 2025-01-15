<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Docentes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos del Docente</li>
        </ol>
    </div>
</div>
<!-- /.container-fluid -->
<?php foreach($docente as $row): ?>
<div class="container-fluid border-dark">
    <!-- INFORMACIÓN PERSONAL -->
    <div class="card border-bottom-primary mb-2">
        <div class="card-header bg-gradient-primary text-light">
            Información Personal
        </div>
        <div class="card-body">
            <div class="form-group col-12">
                <div class="row">
                    <div class="col-md-4">
                        <label for="tipodocumento" class="form-label">Tipo de documento</label>
                        <input class="form-control" id="tipodocumento" name="tipodocumento" value="<?php echo $row->tipodocumento; ?>" >
                    </div>
                    <div class="col-md-4">
                        <label for="numerodocumento" class="form-label">Número de documento</label>
                        <input type="text" class="form-control" id="numerodocumento" name="numerodocumento" value="<?php echo $row->numerodocumento; ?>" >
                    </div>
                    <div class="col-md-4">
                        <label for="fechanacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" id="fechanacimiento" name="fechanacimiento" value="<?php echo $row->fechanacimiento; ?>" >
                    </div>
                </div>
            </div>
            <div class="form-group col-12">
                <div class="row">
                    <div class="col-md-3">
                        <label for="apellido1" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo $row->apellido1; ?>" >
                    </div>
                    <div class="col-md-3">
                        <label for="apellido2" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $row->apellido2; ?>" >
                    </div>
                    <div class="col-md-3">
                        <label for="nombre1" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="nombre1" name="nombre1" value="<?php echo $row->nombre1; ?>" >
                    </div>
                    <div class="col-md-3">
                        <label for="nombre2" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre2" name="nombre2" value="<?php echo $row->nombre2; ?>" >
                    </div>
                </div>
            </div>
            <div class="form-group col-12">
                <div class="row">
                    <div class="col-md-3">
                        <label for="sexo">Sexo</label>
                        <div class="form-check text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexohombre" <?php echo ($row->sexo == 1)?'checked':''; ?> >
                                <label class="form-check-label" for="hombre">Hombre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexomujer" <?php echo ($row->sexo == 0)?'checked':''; ?>>
                                <label class="form-check-label" for="mujer">Mujer</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="genero" class="form-label">Género</label>
                        <input class="form-control" id="genero" name="genero" value="<?php echo $row->genero; ?>" >
                    </div>
                    <div class="col-md-3">
                        <label for="estadocivil" class="form-label">Estado Civil</label>
                        <input class="form-control" id="estadocivil" name="estadocivil" value="<?php echo $row->estadocivil; ?>" >
                    </div>
                    <div class="col-md-3">
                        <label for="etnia" class="form-label">Etnia</label>
                        <input class="form-control" id="etnia" name="etnia" value="<?php echo $row->etnia; ?>" >
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
                        <label for="paisnacionalidad">País de nacionalidad</label>
                        <input class="form-control" name="paisnacionalidad" id="paisnacionalidad" value="<?php echo $row->paisnacionalidad; ?>" >
                    </div>
                    <div class="col-md-3">
                        <label for="provinciasufragio">Provincia de Sufragio</label>
                        <input class="form-control" name="provinciasufragio" id="provinciasufragio" value="<?php echo $row->provinciasufragio; ?>" >
                    </div>
                    <div class="col-md-3">
                        <label for="telefonocelular">Teléfono celular</label>
                        <input type="text" class="form-control" id="telefonocelular" name="telefonocelular" value="<?php echo $row->telefonocelular; ?>" >
                    </div>
                    <div class="col-md-3">
                        <label for="telefonodomicilio">Teléfono domicilio</label>
                        <input type="text" class="form-control" id="telefonodomicilio" name="telefonodomicilio" value="<?php echo $row->telefonodomicilio; ?>" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="direcciondomiciliaria">Dirección domiciliaria</label>
                        <input type="text" class="form-control" id="direcciondomiciliaria" name="direcciondomiciliaria" value="<?php echo $row->direcciondomiciliaria; ?>" >
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $row->email; ?>" >
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
                    <div class="col-md-2 text-center">
                        <label for="discapacidad">Discapacidad</label>
                        <div class="form-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="discapacidad" id="discapacidadSI" <?php echo ($row->discapacidad==1)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="discapacidad" id="discapacidadNO" <?php echo ($row->discapacidad==0)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="numerocarnet"># carnet CONADIS</label>
                        <input type="text" class="form-control" id="numerocarnet" name="numerocarnet" value="<?php echo $row->numerocarnet; ?>" >
                    </div>
                    <div class="col-md-2">
                        <label for="porcentajediscapacidad">% discapacidad</label>
                        <input type="number" class="form-control" id="porcentajediscapacidad" name="porcentajediscapacidad" value="<?php echo $row->porcentajediscapacidad; ?>" >
                    </div>
                    <div class="col-md-4">
                        <label for="tipodiscapacidad" class="form-label">Tipo Discapacidad</label>
                        <input class="form-control" id="tipodiscapacidad" name="tipodiscapacidad"  value="<?php echo $row->tipodiscapacidad; ?>" >
                    </div>
                    <div class="col-md-2 text-center">
                        <label for="enfermedadcatastrofica">Enfermedad Catastrófica</label>
                        <div class="form-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enfermedadcatastrofica" id="enfermedadcatastroficaSI"  <?php echo ($row->enfermedadcatastrofica==1)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enfermedadcatastrofica" id="enfermedadcatastroficaNO" <?php echo ($row->direcciondomiciliaria==0)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- INFORMACION DE ESTUDIOS -->
    <div class="card border-bottom-success mb-2">
        <div class="card-header bg-gradient-success text-light">
            Información de Estudios y Publicaciones
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <label for="cursaestudios">Cursa Estudios</label>
                        <div class="form-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cursaestudios" id="cursaestudiosSI" <?php echo ($row->cursaestudios==1)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cursaestudios" id="cursaestudiosNO" <?php echo ($row->direcciondomiciliaria==0)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <label for="institucionestudios">Institución donde cursa estudios</label>
                        <input type="text" class="form-control" id="institucionestudios" name="institucionestudios"  value="<?php echo $row->institucionestudios; ?>" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="paisestudios" class="form-label">País donde cursa estudios</label>
                        <input class="form-control" id="paisestudios" name="paisestudios"  value="<?php echo $row->paisestudios; ?>" >
                    </div>
                    <div class="col-md-8">
                        <label for="tituloobtener">Titulo a Obtener</label>
                        <input type="text" class="form-control" id="tituloobtener" name="tituloobtener"  value="<?php echo $row->tituloobtener; ?>" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <label for="beca">Beca</label>
                        <div class="form-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="beca" id="becaSI" <?php echo ($row->direcciondomiciliaria==1)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="beca" id="becaNO" <?php echo ($row->direcciondomiciliaria==0)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="tipobeca">Tipo de Beca</label>
                        <input type="text" class="form-control" id="tipobeca" name="tipobeca"  value="<?php echo $row->tipobeca; ?>" >
                    </div>
                    <div class="col-md-2">
                        <label for="montobeca">Monto de Beca</label>
                        <input type="text" class="form-control" id="montobeca" name="montobeca"  value="<?php echo $row->montobeca; ?>" >
                    </div>
                    <div class="col-md-2 text-center">
                        <label for="financiamientobeca">Financiamiento Beca</label>
                        <div class="form-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="financiamientobeca" id="financiamientobecaSI" <?php echo ($row->financiamientobeca==1)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="financiamientobeca" id="financiamientobecaNO" <?php echo ($row->financiamientobeca==0)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <label for="publicaciones">Publicaciones</label>
                        <div class="form-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="publicaciones" id="publicacionesSI" <?php echo ($row->publicaciones==1)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="publicaciones" id="publicacionesNO" <?php echo ($row->publicaciones==0)?'checked':''; ?> >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="numeropublicaciones">Número Publicaciones</label>
                        <input type="text" class="form-control" id="numeropublicaciones" name="numeropublicaciones" value="<?php echo $row->numeropublicaciones; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php include_once './views/layout/footer.php'; ?>
<!-- Custom scripts for app -->
<script src="<?php DIR; ?>functions/main.js"></script>
<script src="<?php DIR; ?>functions/view-docente.js"></script>
</body>

</html>