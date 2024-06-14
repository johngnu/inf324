<?php
    if($guardar==1){
        $documento="insert into jhonusuario.documento values(".$nro.",".$_SESSION["ci"].",NULL,NULL,NULL,NULL,0)";
        mysqli_query($con,$documento);
    }
?>