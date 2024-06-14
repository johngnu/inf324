<?php
    if($guardar==1){
        $respuesta=0;
        if($_POST["respuesta"]=="si"){
            $respuesta=1;
        }
        echo "update jhonusuario.documento set pagado=".$respuesta." where ci=".$ci." and nro=".$nro;
        mysqli_query($con,"update jhonusuario.documento set aprobado=".$respuesta." where ci=".$ci." and nro=".$nro);
    }
?>