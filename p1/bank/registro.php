<?php 
    include "conexion.inc.php";
    $ci=$_POST["ci"]; 
    $nombres=$_POST["nombres"]; 
    $paterno=$_POST["paterno"]; 
    $materno=$_POST["materno"];
    $departamento=$_POST["departamento"]; 
    $celular=$_POST["celular"]; 
    $direccion=$_POST["direccion"]; 

    mysqli_query($con, "insert into persona values('$ci', '$nombres', '$paterno', '$materno', '$direccion', $celular, '$departamento')"); 
    header("Location: personas.php"); 
?>