<?php
    
    $doc = $_GET['img'];
    // $ext = explode('.', $doc); 
    $ext = $_GET['ext'];
    if($ext!='pdf'){

?>
<img src="https://appit.itsup.edu.ec/estudiante/files/<?php echo $doc.'.'.$ext; ?>" alt="" style="width: 50%; height: auto;">
<?php

    } else{
        HEADER("CONTENT-TYPE: APPLICATION/PDF");
        HEADER("CONTENT-DISPOSITION: INLINE; FILENAME=".$FILE);
        READFILE('/var/www/appit/estudiante/files/'.$doc.'.'.$ext);

    }

?>