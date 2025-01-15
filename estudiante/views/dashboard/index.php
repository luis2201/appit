

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div id="alerta" class="alert alert-danger">
                <strong>PROCESO DE POSTULACIÓN DE MATRÍCULA</strong>
                <ol class="mt-2">
                    <li>Actualice sus datos personales asegurándose de tener a la mano, en formato de imagen, la cédula (ambos lados) y Título de Bachiller.</li>
                    <li>En la sección <strong>Mallas Curriculares P2</strong> revise la malla y el nombre de su carrera  para tener en cuenta las materias que va a cursar en el actual periodo.</li>
                    <li>Diríjase a la sección <strong>Matrícula > Solicitar Matrícula</strong> para realizar su postulación.</li>
                </ol>
            </div>
            <!-- Logo -->
            <!-- <div class="col-12 text-center">
                <img src="<?php DIR; ?>img/logo_itsup_2022_redondo.png" alt="appit-itsup" style="width: 30%;">
            </div> -->

        </div>
        <!-- End of Main Content -->

        <div class="modal" id="modalMensaje" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-light">
                        <h5 class="modal-title">¡Aviso del Sistema! Actualización de Foto</h5>
                        <button type="button" class="btn-close" onclick="modalMensaje.hide();" ></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-success">Debes actualizar la foto de tu perfil de estudiante. Recuerda:</p>
                        <p>La foto debe ser tamaño carnet en formato JPEG, con buena resolución, fondo blanco, completamente de frente, 
                            vestimenta formal, no accesorios, que la cabellera muestre el rostro, rostro serio, frente y 
                            orejas descubiertas.
                        </p>
                        <p class="text-center"><a class="btn btn-primary" href="actualizarfoto">Actualizar ahora</a></p>
                    </div>
                </div>
            </div>
        </div>

      <?php include_once './views/layout/footer.php'; ?>
      <script src="<?php echo DIR; ?>functions/index.js?v=1.0.2"></script>
</body>

</html>