<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:;">Materias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Catálago de Materias</li>
        </ol>
    </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
    <div class="card border-bottom-primary">
        <div class="card-header bg-primary">
            <button class="btn btn-success btn-sm float-end" onclick="agregaMateria();"><i class="fas fa-plus-circle"></i> Agregar Materia</button>
        </div>
        <div class="card-body">
            <!-- Tabla de resultados -->
            <table id="tbLista" class="table tabled-condensed table-stripped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                <thead class="bg-primary text-light text-center">
                    <tr>
                        <td scope="col" class="text-center">#</td>
                        <td scope="col" class="text-center">Código</td>
                        <td scope="col" class="text-center">Nombre Materia</td>
                        <td scope="col" class="text-center">Concatenada</td>
                        <td scope="col" class="text-center">Crédito</td>
                        <td scope="col" class="text-center"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($materias as $row) : ?>
                        <tr>
                            <td scope="col" class="text-center"><?php echo $i++; ?></td>
                            <td scope="col" class="text-center"><?php echo $row->codigo; ?></td>
                            <td scope="col"><?php echo $row->materia; ?></td>
                            <td scope="col"><?php echo $row->materia_concatenada; ?></td>
                            <td scope="col" class="text-center"><?php echo $row->creditos; ?></td>
                            <td scope="col" class="text-center">
                                <button id="<?php echo Main::encryption($row->idmateria); ?>" class="btn btn-info btn-sm" title="Agregar materia concatenada" onclick="agregarConcatenada(this.id);"><i class="fas fa-plus-circle"></i> Concatenada</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- End Tabla de resultados -->

        </div>
    </div>
</div>

<!-- Modal para Agregar Materia -->
<div id="modalMateria" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro de Materias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarMateria()"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <label for="codigo">Código</label>
                        <input type="text" id="codigo" name="codigo" class="form-control">
                    </div>
                    <div class="col-md-8">
                        <label for="materia">Materia</label>
                        <input type="text" id="materia" name="materia" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="creditos">Créditos</label>
                        <input type="number" id="creditos" name="creditos" class="form-control" min="0" value="0">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" onclick="guardarMateria()"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Agregar Materia Concatenada -->
<div id="modalConcatenada" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Materia Concatenada</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarConcatenada()"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <input type="hidden" id="idmateria" name="idmateria">
                        <table id="tbConcatenadas" class="table table-condensed table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Materia</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($materias as $row) : ?>
                                <tr>
                                    <td style="width: 10%;"><?php echo $row->codigo; ?></td>
                                    <td><?php echo $row->materia; ?></td>
                                    <td class="text-center" style="width: 5%;">
                                        <button id="<?php echo Main::encryption($row->idmateria); ?>" class="btn btn-success btn-sm" onclick="guardarConcatenada(this.id);"><i class="fas fa-check-circle"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="<?php echo DIR; ?>functions/global.js?v=1.0.0"></script>
<script src="<?php echo DIR; ?>functions/catalogo-materia.js?v=1.1.2"></script>
</body>

</html>