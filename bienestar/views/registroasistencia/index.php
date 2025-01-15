<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Asistencia</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Asistencia y del Desarrollo Currricular</li>
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
            <div class="col-md-5">
              <label for="idcarrera">Carrera</label>
              <select name="idcarrera" id="idcarrera" class="form-select" style="font-size:0.8em">
                <option value="">-- Seleccione Carrera --</option>
                <?php foreach($carreras as $row): ?>
                  <option value="<?php echo Main::encryption($row->idcarrera); ?>"><?php echo $row->carrera; ?></option>
                <?php endforeach; ?>
              </select>
            </div>                                  
            <div class="col-md-4">
              <label for="idmateria">Materia</label>
              <select name="idmateria" id="idmateria" class="form-select" style="font-size:0.8em">
                <option value="">-- Seleccione Materia --</option>
              </select>
            </div>          
            <div class="col-md-2">
              <label for="fecha">Fecha</label>
              <input type="date" id="fecha" name="fecha" class="form-control" style="font-size:0.8em">
            </div>          
            <div class="col-md-1">
              <button id="btnMostrar" type="button" class="btn btn-primary btn-sm" style="margin-top:35px !Important; width:100%" data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-eye"></i> Ver
              </button>
            </div>
          </div>
        </div>        
        <!-- End Parámetros de búsqueda -->      
        <div class="row">                      
          <!-- Tabla de resultados -->
          <div class="col-10" style="margin:auto">                
            <table id="tbCuadro" class="table table-stripped table-responsive" cellspacing="0" cellpadding="0">
              <thead class="bg-primary text-light text-center">
                <tr style="height: 1em; font-weight: bold;font-size: 0.7em;">
                  <td scope="col" class="text-center align-middle">#</td>
                  <td scope="col" class="text-center align-middle verticalText">MAT. N°</td>
                  <td scope="col" class="text-center align-middle">NOMINA</td>
                  <td scope="col" class="text-center align-middle">ASISTENCIA</td>
                  <td scope="col" class="text-center align-middle">OBSERVACION</td>
                </tr>                
              </thead>
              <tbody>
                
              </tbody>
            </table>              
          </div>                        
          <!-- End Tabla de resultados -->
        </div>
    </div>    
  </div>  
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/registro-asistencia.js?v=1.0.9"></script>
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