<?php 
    include "conexion.inc.php";
    $ci=$_POST["ci"]; 
    $nombres=$_POST["nombres"]; 
    $paterno=$_POST["paterno"]; 
    $materno=$_POST["materno"]; 
    $celular=$_POST["celular"]; 
    $direccion=$_POST["direccion"]; 

    mysqli_query($con, "insert into persona values('$ci', '$nombres', '$paterno', '$materno', '$direccion', $celular)"); 
    header("Location: personas.php"); 
?>