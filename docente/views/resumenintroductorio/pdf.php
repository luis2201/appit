<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPIT 1.0 | Aplicación Integrada ITSUP > Estudiante</title>
</head>
<body>

    <table id="tbCuadro" width="100%" cellspacing="0" cellpadding="0" style="font-size:0.75vw; margin-top: -20px;">
        <thead>
            <tr style="height: 20px; font-weight: bold;">
                <td scope="col">#</td>
                <td scope="col">MAT. N°</td>
                <td scope="col">NOMINA</td>
                <td scope="col">P1</td>
                <td scope="col">P2</td>
                <td scope="col">SUMA</td>
                <td scope="col">OBSERVACION</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $idperiodo = Main::limpiar_cadena($_GET['id']);
                $idmateria = Main::limpiar_cadena($_GET['extra1']);

                $idperiodo = Main::decryption($_GET['id']);
                $idmateria = Main::decryption($_GET['extra1']);

                $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
                $res = Calificacionintroductorio::viewListaEstudianteMateria($params);
                
                $i = 1;

                foreach($res as $row):
            ?>
            <tr style="height: 20px; font-size:0.8vw">
                <td class="text-center align-middle" style="width:3%;"><?php echo $i++; ?></td>
                <td class="text-center align-middle" style="width:3%;"><?php echo $row->idmatricula; ?></td>
                <td class="align-middle"><?php echo $row->estudiante; ?></td>
            <?php
                // $param = [":idmatricula" => $row->idmatricula, ":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
                // $calificaciones = Calificacionintroductorio::findresumencalificacionidmatricula($param);
                // if(count($calificaciones)>0){
                //     foreach ($calificaciones as $cal) {               
                //         $aporte = (!is_null($cal->aporte))?number_format($cal->aporte,2):number_format(0,2); 
                //         $lecciones = (!is_null($cal->lecciones))?number_format($cal->lecciones,2):number_format(0,2); 
                //         $tdocencia = (!is_null($cal->tdocencia))?number_format($cal->tdocencia,2):number_format(0,2); 
                //         $practicas = (!is_null($cal->practica))?number_format($cal->practica,2):number_format(0,2); 
                //         $tpracticas = (!is_null($cal->tpractica))?number_format($cal->tpractica,2):number_format(0,2); 
                //         $aprendizaje = (!is_null($cal->aprendizaje))?number_format($cal->aprendizaje,2):number_format(0,2); 
                //         $taprendizaje = (!is_null($cal->taprendizaje))?number_format($cal->taprendizaje,2):number_format(0,2); 
                //         $resultados = (!is_null($cal->resultado))?number_format($cal->resultado,2):number_format(0,2); 
                //         $tresultados = (!is_null($cal->tresultado))?number_format($cal->tresultado,2):number_format(0,2); 
                //         $total = (!is_null($cal->total))?number_format($cal->total,2):number_format(0,2);                          
                    
            ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="firma" style="margin-top:500px;">
        <strong>Firma del Docente</strong>
    </div>     
</body>
</html>