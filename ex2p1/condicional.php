<?php
    if($guardar==1){
        if($_POST["respuesta"]=="si"){
            $camino=1;
        }
        else{
            $camino=0;
        }
    }
    else{
        $sacarcamino=mysqli_query($con,"select * from jhonusuario.documento where ci=".$ci." and nro=".$nro);
        $datoscamino=mysqli_fetch_array($sacarcamino);
        $camino=$datoscamino["aprobado"];
    }
?>