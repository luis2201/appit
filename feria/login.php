<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calificación de Presentaciones</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Iconos Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!-- Gogle FOnts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
</head>
<body>
  <header class="bg-primary text-white text-center align-middle p-3" style="height: 50px;">
    <h4>Calificación de Proyectos</h4>
  </header>
  <main class="container mt-2">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="text-center mb-3">
            <img src="./img/logo_itsup_2022_redondo.png" alt="" style="width: 10em;">
        </div>
        <div class="card">
          <div class="card-body">
            <form action="./class/login.php" method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña" required>
                </div>
              </div>
              <div class="">
                <button type="submit" class="btn btn-primary btn-block" style="width: 100%;">Iniciar Sesión</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="bg-light text-center py-3 mt-5">
    <p>© 2023 <a href="https://www.itsup.edu.ec/">ITSUP</a>. Todos los derechos reservados.</p>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    body{
        font-family: 'Sarabun', sans-serif;
    }

    h4{
        font-family: 'Anton', sans-serif;
    }
</style>
</html>