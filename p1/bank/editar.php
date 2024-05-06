<?php 
    include "conexion.inc.php";
    $ci=$_POST["ci"]; 
    $nombres=$_POST["nombres"]; 
    $paterno=$_POST["paterno"]; 
    $materno=$_POST["materno"]; 
    $celular=$_POST["celular"]; 
    $direccion=$_POST["direccion"]; 

    mysqli_query($con, "update persona set nombres='$nombres', paterno='$paterno', materno='$materno', direccion='$direccion', celular=$celular where ci='$ci'"); 
    header("Location: personas.php"); 
?>