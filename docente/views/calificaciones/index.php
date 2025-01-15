<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Calificaciones</a></li>
      <li class="breadcrumb-item active" aria-current="page">Registro de Calificaciones</li>
    </ol>
  </div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <div class="card border-bottom-primary">
    <div class="card-header bg-primary">

    </div>
    <div class="card-body" style="margin:0; padding:1em">
        <div id="tbLista">
        <div class="row">
            <div class="col-12 mb-2 text-center">
            <img src="<?php DIR; ?>img/header_report.png" alt="">
            <h6 class="m-2"><strong>Alumnos Matriculados</strong></h6>
            <h6 style="margin-top:-10px;">Periodo Académico: Noviembre 2022-Abril 2023</h6>
            </div>
        </div>
        <div class="row" style="margin-top:-20px;">
            <div class="col-4">
            <p id="docente"><strong>DOCENTE: </strong><?php echo $_SESSION["nombres_appit"]; ?></p>
            </div>
            <div class="col-2">
            <p id="semestre"></p>
            </div>
            <div class="col-2">
            <p id="seccion"></p>
            </div>
            <div class="col-4">
            <p id="carrera"></p>
            </div>
        </div>
        <table id="tbCuadro" class="table table-stripped table-responsive" width="100%"  cellspacing="0" cellpadding="0" style="font-size:11px; margin-top:-20px;">
            <thead class="bg-primary text-light text-center">
            <tr style="height: 20px; font-weight: bold;">
                <td scope="col" class="text-center align-middle" rowspan="2" style="width: 5%;">#</td>
                <td scope="col" class="text-center align-middle verticalText" rowspan="2" style="width: 5%;">MAT. N°</td>
                <td scope="col" class="text-center align-middle" rowspan="2" style="width: 60%;">NOMINA</td>
                <td scope="col" class="text-center" colspan="2">DOCENCIA (15pts)</td>
                <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>DOCENCIA</td>
                <td scope="col" class="text-center" style="width: 100px" rowspan="2">PRACTICAS DE<br>APLICACIÓN Y<br>EXPERIMENTACIÓN<br>(10pts)</td>
                <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>PRACTICAS</td>
                <td scope="col" class="text-center" style="width: 100px" rowspan="2">ACTIVIDADES DE<br>APRENDIZAJE<br>AUTONOMO<br>(10pts)</td>
                <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>AAU</td>
                <td scope="col" class="text-center align-middle" rowspan="2">RESULTADOS (15pts)</td>
                <td scope="col" class="text-center align-middle" rowspan="2">TOTAL<br>RESULTADOS</td>
                <td scope="col" class="text-center align-middle" rowspan="2">TOTAL</th>
            </tr>
            <tr style="font-weight: bold;">
                <td scope="col" class="text-center" style="width: 100px">Aporte<br>(10pts)</td>
                <td scope="col" class="text-center" style="width: 100px;">Lecciones<br>(5pts)</td>
            </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
        <div id="firma" class="row text-center mt-5">
            <strong>Firma del Docente</strong>
        </div>
        </div>
        <!-- End Tabña de resultados -->
        <button type="button" id="btnImprimir" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Volver</button>
    </div>
  </div>
</div>

<?php include_once './views/layout/footer.php' ?>
<!--    Scripts -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="<?php echo DIR; ?>functions/calificaciones.js"></script>
</body>
<style>
 #idlista{
    font-size: 8px;
 }
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