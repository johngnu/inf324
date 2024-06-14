<?php   
    if($guardar==1){
        $sacarnombre=mysqli_query($con,"select * from jhonusuario.persona where ci=".$_SESSION["ci"]);
        $datosnombre=mysqli_fetch_array($sacarnombre);
        $direccion=$nro."pago".$datosnombre["nombre"].$datosnombre["apellido"].".pdf";
        mysqli_query($con,"update jhonusuario.documento set cpago='".$direccion."' where ci=".$_SESSION["ci"]." and nro=".$nro);
        move_uploaded_file($_FILES["pago"]["tmp_name"],"archivosrespaldos/".$direccion);
    }
?>