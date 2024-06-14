<?php
    if($guardar==1){
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $actualiza="update jhonusuario.persona set nombre='".$nombre."', apellido='".$apellido."' where ci=".$_SESSION["ci"];
        mysqli_query($con,$actualiza);
    }
?>