<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Syllabus</a></li>
      <li class="breadcrumb-item active" aria-current="page">Generar y Firmar Programa Analìtico y Syllabus</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="card border-bottom-primary">
        <div class="card-header bg-primary text-light">
            <h5>Programa Analítico de la Asignatura</h5>
        </div>
        <div class="card-body">                    
            <!-- Parámetros de búsqueda -->
            <div class="form form-group">
                <div class="row">          
                    <div class="col">
                        <label for="cmbidperiodo">Periodo Académico</label>
                        <select name="cmbidperiodo" id="cmbidperiodo" class="form-select">
                        <?php 
                            foreach($periodos as $row): 
                                $iperiodo = $row->idperiodo;
                        ?>
                            <option value="<?php echo Main::encryption($row->idperiodo); ?>"><?php echo $row->periodo; ?></option>                                
                        <?php endforeach; ?>
                        </select>
                    </div>                
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="card">
                            <table class="table table-condensed">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th class="text-center">#</th>                                        
                                        <th class="text-center">Materia</th>                                        
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>    
                                <?php 
                                    $iddocente = $_SESSION['idusuario_appit'];
                                    
                                    $params = [":idperiodo" => $idperiodo, ":iddocente" => $iddocente];                                    
                                    $resp = Programaanalitico::findSyllabusIdDocente($params);
                                    $i = 1;
                                    foreach ($resp as $row) {                                                                                
                                ?> 
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td><?php echo $row->nombreAsignatura; ?></td>                                                                                
                                        <td class="text-center">
                                            <button id="<?php echo ucfirst(Main::encryption($row->idsyllabus)); ?>" class="btn btn-success" onClick="mostrar(this.id);"><i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>                                    
                                <?php } ?>
                                </tbody>                                
                            </table>
                        </div>
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
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" id="idsyllabus" name="idsyllabus" value="">
                                <label for="pas_firma">Contraseña de Firma Electrónica</label>
                                <input type="password" id="pas_firma" name="pas_firma" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">    
                        <button type="button" id="btnFirmar" class="btn btn-primary btn-sm">Firmar Documento (Aún no disponible)</button>          
                        <button type="button" id="btnCerrar" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Cerrar</button>
                    </div>
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
<script src="<?php echo DIR; ?>functions/generar-pdf.js?v=2.0.3"></script>
</body>
</html>