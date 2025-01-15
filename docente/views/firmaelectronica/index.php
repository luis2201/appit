<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Firma Electrónica</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Firma Electrónica</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
    <div class="card border-bottom-primary">
        <div class="card-header bg-primary text-light">
            <h5 class="float-left">Firma Electrónica</h5>
        </div>
        <div class="card-body">                    
            <!-- Parámetros de búsqueda -->
            <div class="row mt-2">
                <div class="col">
                    <div class="card p-3">
                    <?php                     
                        foreach ($firmas as $row) {
                            $doc_firma = $row->doc_firma;                        
                        }                        
                        if($doc_firma == ''){
                    ?>
                        <button id="btnMostrar" class="btn btn-success float-end" style="width:50%; margin:auto;">Agregar Archivo de Firma Electrónica</button>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            Usted ya posee una firma electrónica registrada
                        </div>
                    <?php } ?> 
                    </div>
                </div>
            </div>                
            <!-- End Parámetros de búsqueda -->   
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                <div class="modal-content">      
                    <div id="header" class="modal-header">
                        <h6>Firma Electrónica</h6>
                    </div>      
                    <form id="form">
                        <div class="modal-body">
                            <input type="hidden" id="idsyllabus" name="idsyllabus" value="<?php echo ucfirst(Main::encryption($row->idsyllabus)); ?>">
                            <div class="row">
                                <div class="col">
                                    <label for="doc_firma">Archivo Firma</label>
                                    <input type="file" id="doc_firma" name="doc_firma" class="form-control" accept=".p12">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="contrasena">Contraseña</label>
                                    <input type="password" id="contrasena" name="contrasena" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="contrasena">Confirmar Contraseña</label>
                                    <input type="password" id="confirmarcontrasena" name="confirmarcontrasena" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">    
                            <button type="submit" class="btn btn-primary btn-sm">Guardar Archivo</button>          
                            <button id="btnCerrar" type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <!-- Fin Modal -->

        </div>
    </div>
</div> 

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo DIR; ?>functions/firma-electronica.js?v=2.5"></script>
</body>
</html>