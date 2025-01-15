<?php
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location: index.php");
    }
?>
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
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand bolder" href="dashboard.php" style="font-family:'Anton', sans-serif;">CALIFICACION DE PROYECTOS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="totales.php">Calificar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./class/logout.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="text-center">
            <img src="./img/logo_itsup_2022_redondo.png" alt="" style="width: 100%;">
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
</style>
</html>