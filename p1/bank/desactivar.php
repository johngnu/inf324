<?php 
    include "conexion.inc.php";
    
    $nro=$_GET["nro"]; 
    $ci=$_GET["ci"];
    mysqli_query($con, "update cuenta set estado='X' where nro='$nro'"); 
    header("Location: cuentas.php?ci=".$ci); 
?>