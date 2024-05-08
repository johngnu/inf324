<?php 
    include "conexion.inc.php";
    $ci=$_POST["ci"]; 
    $tipo_cuenta=$_POST["tipo_cuenta"]; 
    $monto=$_POST["monto"]; 
    $nro = time();
    
    mysqli_query($con, "insert into cuenta values('$nro', '$ci', $tipo_cuenta, $monto, CURDATE(), 'A')"); 
    //die();
    header("Location: cuentas.php?ci=$ci"); 
?>