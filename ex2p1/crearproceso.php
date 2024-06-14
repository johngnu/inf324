<?php
    session_start();
    include "conexion.php";
    $seguimiento=mysqli_query($con,"select max(nro) max from seguimiento");
    $sacarseguimiento=mysqli_fetch_array($seguimiento);
    $fechainicio=date('Y-m-d h:i:s');
    $ci=$_SESSION["ci"];
    if(isset($sacarseguimiento["max"])){
        $nro=$sacarseguimiento["max"]+1;
        $sql="insert into seguimiento values ($nro,'F1','P1','$fechainicio',NULL,$ci)";
        echo $sql;
        mysqli_query($con,$sql);
    }
    else{
        $sql="insert into seguimiento values (1,'F1','P1','$fechainicio',NULL,$ci)";
        mysqli_query($con,$sql);
    }
    header("Location: ".$_SESSION["rol"].".php");
?>