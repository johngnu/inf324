<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>   
<body>
    <?php 
        include "menu.php";
        include "conexion.inc.php"; 
        $resultado = mysqli_query($con, "select * from persona"); 
    ?>    
    <div class="ficha">
        <br><a class="addButton" href="registro-form.php">Agregar Nuevo Registro</a><br>&nbsp;
    </div>

    <table>
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre completo</th>
                <th>Celular</th>
                <th>Dirección</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php 
        while($fila = mysqli_fetch_array($resultado)) { 
            echo '<tr>'; 
            echo '<td>'.$fila["ci"].'</td>'; 
            echo '<td>'.$fila["paterno"]." ".$fila["materno"]." ".$fila["nombres"]."</td>"; 
            echo '<td class="style: text-align: rigth">'.$fila["celular"].'</td>';  
            echo '<td>'.$fila["direccion"].'</td>';                     
        ?>
            <td class="action-buttons">                
                <a class="fcc-btn" href="cuentas.php?ci=<?php echo $fila["ci"]; ?>">
                    <img src="img/s_rights.png" title="Cuentas" alt="Cuentas"> Cuentas
                </a>
                <a class="fcc-btn" href="editar-form.php?ci=<?php echo $fila["ci"]; ?>">
                    <img src="img/b_edit.png" title="Editar" alt="Editar"> Editar
                </a>    
                <a class="fcc-btn" href="eliminar-confirm.php?ci=<?php echo $fila["ci"]; ?>">
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
