<?php 
    include "conexion.inc.php";
    
    $ci=$_GET["ci"]; 
    mysqli_query($con, "delete from persona where ci='$ci'"); 
    header("Location: personas.php"); 
?>