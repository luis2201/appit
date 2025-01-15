<!-- Begin Page Content -->
<div class="container-fluid">
<?php echo $_SESSION['ideriodo_appit']; ?>
  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Supletorio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Calificaciones Supletorias</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">

    </div>
    <div class="card-body">
      <?php 
        $fechaActual = date('Y-m-d');
  
        $result = Registrocalificacion::validafecha();
        foreach($result as $row){
          if($row->fecha_apertura>=$fechaActual && $row->fecha_cierre<=$fechaActual){
      ?>
      <div id="mensaje" class="alert alert-danger">
        Módulo de claificaciones cerrado. Para realizar cambios o ingresar nuevas calificaciones deberá realizar la respectiva solicitud en Secretaría.
      </div>
      <?php 
          } else {

      ?>
      <!-- Parámetros de búsqueda -->
      <div class="form form-group">
        <div class="row">
          <div class="col-md-5">
            <label for="idcarrera">Carrera</label>
            <select name="idcarrera" id="idcarrera" class="form-select">
              <option value="">-- Seleccione Carrera --</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="idseccion">Sección</label>
            <select name="idseccion" id="idseccion" class="form-select">
              <option value="">-- Seleccione Sección --</option>
              
            </select>
          </div>
          <div class="col-md-3">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-select">
              <option value="">-- Seleccione Modalidad --</option>
            </select>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-3">
            <label for="idnivel">Curso</label>
            <select name="idnivel" id="idnivel" class="form-select">
              <option value="">-- Seleccione Curso --</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="idmateria">Materia</label>
            <select name="idmateria" id="idmateria" class="form-select">
              <option value="">-- Seleccione Materia --</option>
            </select>
          </div>
          <div class="col-md-2 mt-3">
            <button id="btnMostrar" type="button" class="btn btn-primary btn-sm btn-block mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false">
            <i class="fas fa-edit"></i> Ingresar calificaciones
            </button>
          </div>
        </div>
        <div class="row">
      </div>
      <!-- End Parámetros de búsqueda -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">      
            <div id="header" class="modal-header">
                <h6>Registro de Supletorios</h6>
            </div>      
            <div class="modal-body">
              <!-- Tabla de resultados -->
              <div id="tbLista">
                <div id="encabezado" class="row" style="display:none">
                  <div class="col-12 mb-2 text-center">
                    <img src="<?php DIR; ?>img/header_report.png" alt="">
                    <h6 class="m-2"><strong>Resumen del Periodo Académico</strong></h6>
                    <h6 style="margin-top: -10px">Periodo Académico: Noviembre 2022-Abril 2023</h6>
                  </div>
                </div>
                <div class="row">
                  <table id="tbCuadro" class="table table-stripped table-responsive" width="75%" cellspacing="0" cellpadding="0" style="font-size: 11px">
                    <thead class="bg-primary text-light text-center">
                      <tr style="height: 20px; font-weight: bold;">
                        <td scope="col" class="text-center align-middle">#</td>
                        <td scope="col" class="text-center align-middle verticalText" rowspan="2">MAT. N°</td>
                        <td scope="col" class="text-center align-middle" style="width: 60%;">NOMINA</td>
                        <td scope="col" class="text-center align-middle">PARCIAL 1</td>
                        <td scope="col" class="text-center">PARCIAL 2</td>
                        <td scope="col" class="text-center">TOTAL</td>
                        <td scope="col" class="text-center">SUPLETORIO</td>
                        <td scope="col" class="text-center" style="width: 20%;">NOTA FINAL</td>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
                <div id="firma" class="row text-center mt-5" style="display:none">
                  <strong>Firma del Docente</strong>
                </div>
              </div>
              <!-- End Tabña de resultados -->
            </div>
            <div class="modal-footer">              
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      
      <?php
        }
      }
      ?>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/supletorio.js?v=1.0.1"></script>
</body>
<style>

  table {
    border: #000 1px solid;
  }
  
  td, th {
    border: black 1px solid;
  }
  tr td:last-child{
    width:1%;
}

</style>
</html>