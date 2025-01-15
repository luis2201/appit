<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Configuración</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cambio de contraseña</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">

    </div>
    <div class="card-body">
        <div class="col-6" style="margin: auto;">

            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h5>Cambio de contraseña</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning text-justify"><strong>¡AVISO!</strong> Para mayor seguridad ingrese una contraseña que contenga letras y números con un mínimo de 8 caracteres. Recuerde que sus datos de acceso son intranferibles.</div>
                    <form id="form">
                        <div class="mb-3">
                            <label for="contrasenaactual" class="form-label">Contraseña actual</label>
                            <input type="password" class="form-control" id="contrasenaactual">
                        </div>
                        <div class="mb-3">
                            <label for="nuevacontrasena" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="nuevacontrasena">
                        </div>
                        <div class="mb-3">
                            <label for="confirmecontrasena" class="form-label">Confirme contraseña</label>
                            <input type="password" class="form-control" id="confirmecontrasena">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo DIR; ?>functions/contrasena.js"></script>

</body>

</html>