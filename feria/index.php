<?php
    require 'class/Stands.php';
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
  <header class="bg-primary text-white text-center align-middle p-3" style="height: 50px;">
    <h4>Calificación de Proyectos</h4>
  </header>
  <main class="container mt-2">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="bg-dark text-light text-center"></div>
        <hr>
        <div class="row">
        <?php
            $result = Stands::findAll();

            foreach($result as $row):
        ?>
            <div class="col-3 mb-2" style="margin: auto; font-size:0.7em">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 style="font-weight:bold"><?php echo $row->nombre; ?></h5>
                    </div>
                    <div class="card-body text-center">
                        <strong>Puntos</strong><br>
                        <?php echo $row->visitantes; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <hr>
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