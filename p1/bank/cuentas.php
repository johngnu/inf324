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
            <a class="addButton" href="cuentas-form.php?ci=<?php echo $ci; ?>">Agregar Nuevo Cuenta</a><br>&nbsp;
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Tipo cuenta</th>
                    <th>Monto inicial</th>
                    <th>Registro</th>
                    <th>Saldo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php            
            $resultado = mysqli_query($con, "select *, (select descripcion from tipo_cuenta where 
            id=tipo_cuenta) tipo, 0 saldo from cuenta where estado='A' and ci='$ci'"); 
            while($fila = mysqli_fetch_array($resultado)) { 
                echo '<tr>'; 
                echo '<td>'.$fila["nro"].'</td>'; 
                echo '<td>'.$fila["tipo"]."</td>"; 
                echo '<td class="style: text-align: rigth">'.$fila["monto"].'</td>';  
                echo '<td>'.$fila["registro"].'</td>';    
                echo '<td>'.$fila["saldo"]."</td>";                  
            ?>
                <td class="action-buttons">
                    <a class="fcc-btn" href="transacciones.php?nro=<?php echo $fila["nro"]; ?>">
                        <img src="img/b_insrow.png" title="Transacciones" alt="Transacciones"> Transac...
                    </a>
                        
                    <a class="fcc-btn" href="desactivar.php?ci=<?php echo $fila["ci"]; ?>&nro=<?php echo $fila["nro"]; ?>">
                        <img src="img/b_drop.png" title="Borrar" alt="Borrar"> Borrar
                    </a>                                      
                </td>    
            <?php
                echo '</tr>'; 
            } 
            ?>
            </tbody>
        </table>
    </body>
</html>
