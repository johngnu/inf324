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
            $ctas = mysqli_query($con, "select * from tipo_cuenta"); 
            //$dt = time();
            //echo $dt;
        ?>  
        <div class="ficha">
            <h3>Daos del cliente</h3>
            <strong>CI: </strong><?php echo $row['ci']; ?>&nbsp;&nbsp;&nbsp;
            <strong>Nombre completo: </strong><?php echo $row['paterno'].' '.$row['materno'].' '.$row['nombres']; ?><br>
            <strong>Celular: </strong><?php echo $row['celular']; ?><br>
            <strong>Dirección: </strong><?php echo $row['direccion']; ?><br><hr><br>
            <a class="addButton" href="cuentas.php?ci=<?php echo $ci; ?>">Volver a Cuentas</a><br>&nbsp;
        </div>
        
        <form action="registro-cuenta.php" method="post">
        <h2>Apertura de Cuenta</h2>
        <label>Tipo de cuenta (min):</label>
        <select class="form-field" name="tipo_cuenta">            
            <?php
            while($fila = mysqli_fetch_array($ctas)) { 
                echo '<option value="'.$fila['id'].'">'.$fila['descripcion'].' - '.$fila['monto_minimo'].'</option>';   
            }                    
            ?>            
        </select>

        <label for="monto">Monto inicial:</label>
        <input class="form-field" type="number" id="monto" name="monto" step="any" required>
        <input type="hidden" value="<?php echo $row['ci']; ?>" name="ci">
        
        <input class="guardar" type="submit" value="Guardar">
    </form> 
    </body>
</html>