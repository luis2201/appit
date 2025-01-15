<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPIT 1.0 | Aplicación Integrada ITSUP > Estudiante</title>
</head>
<body>
    <?php

        $idperiodo = Main::limpiar_cadena($_GET['id']);
        $idmateria = Main::limpiar_cadena($_GET['extra1']);

        $idperiodo = Main::decryption($_GET['id']);
        $idmateria = Main::decryption($_GET['extra1']);

        $param = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
        $datos = Materia::findDatosDocenteMateria($param);
        foreach($datos as $row){
            $docente = $row->docente;
            $materia = $row->materia;
        }

    ?>
    <div style="text-align:center">
        <img src="data:image/png;base64,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" alt="">
        <h4>RESUMEN DE CALIFICACIONES DEL PARCIAL</h4>
    </div>
    
    <table style="width:100%; border:1px solid #000; border-collapse:collapse; font-size:0.75em; line-height:15px;">
        <tr>
            <td style="background-color:#ddd; width:10%; border:1px solid #000;"><strong>Docente:</strong></td>
            <td  style="border:1px solid #000;"><?php echo $docente; ?></td>
        </tr>
        <tr>
            <td style="background-color:#ddd; width:10%; border:1px solid #000;"><strong>Materia:</strong></td>
            <td><?php echo $materia; ?></td>
        </tr>
    </table>
    <table id="tbCuadro" width="100%" cellspacing="0" cellpadding="0" style="font-size:0.75em; margin-top:10px; border-style:solid; border-color:#000; border-width:1px; border-collapse:collapse; line-height:20px; vertical-align: middle;">
        <thead>
            <tr style="height:20px; font-weight:bold;background-color:#0d6efd; color:#fff; text-align:center;">
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

                $params = [":idperiodo" => $idperiodo, ":idmateria" => $idmateria];
                $res = Calificacionintroductorio::viewListaEstudianteMateria($params);
                
                $i = 1;

                foreach($res as $row):
            ?>
            <tr style="height:20px; border-style:solid; border-color:#000; border-width:1px; border-collapse:collapse">
                <td style="width:5%; text-align:center;"><?php echo $i++; ?></td>
                <td style="width:8%; text-align:center;"><?php echo $row->idmatricula; ?></td>
                <td style="width:40%;"><?php echo $row->estudiante; ?></td>
                <?php
                    $p1 = 0;
                    $p2 = 0;

                    $param = [":idmatricula" => $row->idmatricula, ":idmateria" => $idmateria, ":idparcial" => 1];                
                    $calificaciones = Calificacionintroductorio::findresumencalificacionidmatricula($param);
                    
                    if(count($calificaciones)>0){
                        foreach ($calificaciones as $cal1):                        
                            $p1 = (!is_null($cal1->total))?number_format($cal1->total,2):number_format(0,2);                        
                        ?>            
                            <td style="width:10%; text-align:center;"><?php echo (!is_null($cal1->total))?number_format($cal1->total,2):number_format(0,2); ?></td>
                        <?php endforeach; ?>
                <?php } else{ ?>
                    <td style="width:10%; text-align:center;">0.00</td>
                <?php
                    }            
                    $param = [":idmatricula" => $row->idmatricula, ":idmateria" => $idmateria, ":idparcial" => 2];                
                    $calificaciones = Calificacionintroductorio::findresumencalificacionidmatricula($param);
                    
                    if(!is_null($cal1->total)){                            
                        foreach ($calificaciones as $cal2):
                            $p2 = (!is_null($cal2->total))?number_format($cal2->total,2):number_format(0,2);                        
                ?>            
                    <td style="text-align:center; width:10%;"><?php echo (!is_null($cal2->total))?number_format($cal2->total,2):number_format(0,2); ?></td>
                <?php endforeach; ?>
                <?php } else{ ?>
                    <td style="text-align:center;">0.00</td>
                <?php } ?>
                <td style="text-align:center; width:10%;"><?php echo (!is_null($p1+$p2))?number_format($p1+$p2,2):number_format(0,2); ?></td>                
                <td style="text-align:center; width:20%;"><?php echo (($p1+$p2)>=70)?'APROBADO':'REPROBADO'; ?></td>                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="firma" style="margin-top:50px;text-align:center;">
        <strong>Firma del Docente</strong>
    </div>     
</body>
</html>
<?php

    $html = ob_get_clean();
    // echo $html;

    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4','portrait');

    $dompdf->render();

    $dompdf->stream("resumenb_introductorio.pdf", array("Attachment" => false));

?>