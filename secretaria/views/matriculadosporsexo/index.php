<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Estadísticas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Estadística Estudiantes de Carrera por Sexo por Periodos</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">

    </div>
    <div class="card-body">
      <div class="row">
        <!-- Parámetros de búsqueda -->
        <div class="col form form-group">
          <div class="row">
            <div class="col">
              <label for="idperiodo">Periodo</label>
              <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
                <option value="">-- Seleccione Periodo --</option>
                <?php foreach ($periodostodos as $row) : ?>
                  <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <!-- End Parámetros de búsqueda -->
      </div>
      <div class="row">
        <!-- Tabla de resultados -->
        <div id="tabla" class="col table-responsive">
          
        </div>
        <!-- Tabla de resultados -->
      </div>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/matriculados-porsexo.js?v=1.0.8"></script>

</body>

</html>