<?php
    include "conexion.php";
    $pass=md5($_POST["password"]);
    $usuario=$_POST["usuario"];
    $usuarios=mysqli_query($con,"select * from jhonusuario.usuario where pass='".$pass."' and usuario='".$usuario."'");
    $sacardatosusuario=mysqli_fetch_array($usuarios);
    if(empty($sacardatosusuario)){
        header("Location: index.php?mensaje=si");
    }
    else{
        session_start();
        if($usuario=="admin"){
            $_SESSION["rol"]="administrador";
        }
        else{
            $_SESSION["rol"]="cliente";
        }
        $_SESSION["ci"]=$sacardatosusuario["ci"];
        echo $_SESSION["rol"]." ".$_SESSION["ci"];
        header("Location:".$_SESSION['rol'].".php");
    }
?>