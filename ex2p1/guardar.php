<?php
    $sql2="select * from seguimiento where nro=".$nro." and procesoactual='".$proceso."'";
    $sacardatos=mysqli_query($con,$sql2);
    $verdatos=mysqli_fetch_array($sacardatos);
    if($verdatos["fechafin"]==""){
        $guardar=1;
    }    
    else{
        $guardar=0;
    }
?>