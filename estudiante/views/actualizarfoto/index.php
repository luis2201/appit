        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Foto</a></li>
              <li class="breadcrumb-item active" aria-current="page">Actualización Foto del Perfil del Estudiante</li>              
            </ol>
          </div>

        </div>
        <!-- /.container-fluid -->

        <div class="container-fluid border-dark">
          <!-- Begin Form SolicitudMatrícula -->
            <div class="card border-bottom-primary mb-2">
              <div class="card-header bg-primary text-light">
                Tu foto en tu Perfil       
                <button class="btn btn-success float-end" onclick="mostrarModal()">Actualizar Foto</button>         
              </div>
              <div class="card-body">                
                <div class="col-4" style="margin:auto;">
                    <img src="<?php echo DIR . 'files/' . $datos->foto; ?>" alt="" style="width:300px">
                </div>
              </div>
            </div>
          <!-- End Form SolicitudMatricula -->
        </div>

        <div class="modal" id="modalActualizar" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-light">
                        <h5 class="modal-title">¡Aviso del Sistema! Actualización de Foto</h5>
                        <button type="button" class="btn-close" onclick="modalActualizar.hide();" ></button>
                    </div>
                    <form id="form">
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" id="idestudiante" name="idestudiante" value="<?php echo $_SESSION['idestudiante_appit']; ?>">
                                <input type="hidden" id="fotoactual" name="fotoactual" value="<?php echo $datos->foto; ?>">
                                <label for="ingresos">Seleccione una foto tamaño carnet con fondo blanco</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

  <?php include_once './views/layout/footer.php' ?>
  <script src="<?php echo DIR; ?>functions/actualizar-foto.js?v=1.0.3"></script>
</body>

</html>