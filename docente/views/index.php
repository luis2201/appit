<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Mensajes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Mensajes Recibidos</li>
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
            <div class="col-8" style="margin:auto">
                <table class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th class="text-center">Título</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>     
                    <?php foreach($mensajes as $row): ?>
                      <tr>
                        <td style="width:5%" class="text-center">                        
                          <button id="<?php echo $row->idmensaje; ?>" onclick="mostrar(this.id)" class="btn <?php echo ($row->estado==1)? 'btn-primary':'btn-secondary' ?> btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </td>                          
                        <td>
                          <?php echo ($row->estado==1)?'<strong>'.$row->titulo.'</strong>':$row->titulo ?>
                        </td>
                        <td style="width:5%" class="text-center">
                          <input type="hidden" id="titulo-<?php echo $row->idmensaje; ?>" value="<?php echo $row->titulo; ?>">
                          <input type="hidden" id="mensaje-<?php echo $row->idmensaje; ?>" value="<?php echo $row->mensaje; ?>">
                          <button id="<?php echo $row->idmensaje; ?>" class="btn btn-danger btn-sm" onclick="eliminar(this.id)" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>        
      <!-- End Parámetros de búsqueda -->

      <!-- Modal -->
      <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="titulo-mensaje"></h5>
            </div>
            <div class="modal-body">
              <p id="cuerpo-mensaje"></p>
            </div>
            <div class="modal-footer">              
              <button type="button" id="btnCerrar" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End formulario Modal -->
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/mensaje.js?v=1.0.2"></script>
</body>
</html>