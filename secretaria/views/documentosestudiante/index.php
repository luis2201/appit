<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Documentos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver documentos de Estudiantes</li>
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
              <option value="">-- Seleccione Sección --</option>
              <?php
              foreach ($secciones as $row) :
              ?>
                <option value="<?php echo Main::encryption($row->idseccion); ?>"><?php echo $row->seccion; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-3">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-select">
              <option value="">-- Seleccione Modalidad --</option>
              <option value="Presencial">Presencial</option>
              <option value="Virtual">Virtual</option>
            </select>
          </div>
          <div class="col-md-5">
            <label for="idcarrera">Nivel</label>
            <select name="idnivel" id="idnivel" class="form-select">
              <option value="">-- Seleccione Nivel --</option>
              <?php
              foreach ($niveles as $row) :
              ?>
                <option value="<?php echo Main::encryption($row->idnivel); ?>"><?php echo $row->nivel; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar Lista</button>
          </div>
        </div>
      </div>
      <!-- End Parámetros de búsqueda -->
      
      <div class="row">
        <div class="container">
          <table id="tbLista" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
            <thead class="bg-primary text-light text-center">
              <tr>
                <td scope="col" class="text-center">#</td>
                <td scope="col" class="text-center">No. Matr</td>
                <td scope="col" class="text-center">ALUMNOS</td>
                <td scope="col" class="text-center">CÉDULA</td>
                <td scope="col" class="text-center">FECHA DE NACIMIENTO</td>
                <td scope="col" class="text-center">CELULAR</th>
                <td scope="col" class="text-center">DOC CEDULA</th>
                <td scope="col" class="text-center">DOC TITULO</th>
                <td scope="col" class="text-center">FOTO</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/documentos-estudiante.js?v=1.0.1"></script>

</body>

</html>