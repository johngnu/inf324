<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>   
    <body>  
        <?php 
            include "menu.php";
            include "conexion.inc.php";
            $ci=$_GET["ci"]; 
            $resultado = mysqli_query($con, "select * from persona where ci='$ci'"); 
            if (mysqli_num_rows($resultado) == 0) {
                header("Location: buscar.php"); 
            } 
            $row = mysqli_fetch_array($resultado);
        ?>  
        <div class="ficha">
            <h3>Daos del cliente</h3>
            <strong>CI: </strong><?php echo $row['ci']; ?>&nbsp;&nbsp;&nbsp;
            <strong>Nombre completo: </strong><?php echo $row['paterno'].' '.$row['materno'].' '.$row['nombres']; ?><br>
            <strong>Celular: </strong><?php echo $row['celular']; ?><br>
            <strong>Dirección: </strong><?php echo $row['direccion']; ?><br><hr><br>
            <a class="deleteButton" href="eliminar.php?ci=<?php echo $ci; ?>">Confirmar eliminar</a><br>&nbsp;
        </div>        
    </body>
</html>
