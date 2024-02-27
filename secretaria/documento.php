<?php
    
    $ext = explode(".", $_GET['img']);
    if($ext[1]!='pdf'){

?>
<img src="https://appit.itsup.edu.ec/estudiante/files/<?php echo $_GET['img']; ?>" alt="" style="width: 50%; height: auto;">
<?php

    } else{
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=".$_GET['img']);
        readfile('/var/www/appit/estudiante/files/'.$_GET['img']);

    }

?>