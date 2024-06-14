<?php
    session_start();
    include "conexion.php";
    $nro=$_POST["nro"];
    $flujo=$_POST["flujo"];
    $proceso=$_POST["proceso"];
    $pantalla=$_POST["pantalla"];
    $ci=$_POST["ci"];
    include "guardar.php";
    include "archivos/".$pantalla.".guardar.php";
    if (isset($_POST["Atras"]))
    {
        $sql="select * from procesos where flujo='".$flujo."' 
        and procesosiguiente='".$proceso."' ";	
        $resultado=mysqli_query($con, $sql);
        $registro=mysqli_fetch_array($resultado);
        $procesosiguiente=$registro["procesoactual"];
        if($procesosiguiente==""){
            $condicional=mysqli_query($con,"select * from pcondicional where psi='".$proceso."' or pno='".$proceso."'");
            $datoscondicional=mysqli_fetch_array($condicional);
            $procesosiguiente=$datoscondicional["procesoactual"];
        }
    }

    if (isset($_POST["Adelante"]))
    {
        $sql="select * from procesos where flujo='".$flujo."' 
        and procesoactual='".$proceso."' ";	
        $resultado=mysqli_query($con, $sql);
        $registro=mysqli_fetch_array($resultado);
        $procesosiguiente=$registro["procesosiguiente"];
        if($procesosiguiente==""){
            $condicional=mysqli_query($con,"select * from pcondicional where procesoactual='".$proceso."'");
            $datoscondicional=mysqli_fetch_array($condicional);
            include "condicional.php";
            if($camino==1){
                $procesosiguiente=$datoscondicional["psi"];
            }
            else{
                $procesosiguiente=$datoscondicional["pno"];
            }
            
        }
        if($guardar==1){
            $fecha=date('Y-m-d h:i:s');
            $sqlupdate="update seguimiento set fechafin='".$fecha."' where nro=".$nro." and procesoactual='".$proceso."'";
            mysqli_query($con,$sqlupdate);
            $sqlinsert="insert into seguimiento values(".$nro.",'".$flujo."','".$procesosiguiente."','".$fecha."',NULL,".$ci.")";
            mysqli_query($con,$sqlinsert);
        }
    }
    header("Location: procesos.php?flujo=".$flujo."&proceso=".$procesosiguiente."&nro=".$nro);
?>